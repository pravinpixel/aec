<?php

namespace App\Http\Controllers;

use App\Models\LiveProjectInvoice;
use App\Models\Project;
use App\Services\SoapService;
use Carbon\Carbon;

class SoapController extends Controller
{

    public function credential()
    {
        $url = config('24-seven-office.authenticate.url');
        $body = config('24-seven-office.authenticate.body');
        $SoapService = new SoapService();
        try {
            $response    = $SoapService->call($url, $body);
            $login_token = formatXml($response, true);
            session()->put('24-seven-office-token', json_encode($login_token->LoginResult[0]));
            return response()->json([
                "status" => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "error" => $th->getMessage()
            ]);
        }
    }
    public function GetProducts()
    {
        $SoapService = new SoapService();

        $xml = '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <GetProducts xmlns="http://24sevenOffice.com/webservices">
                        <searchParams>
                            <Id>1000</Id>
                            <CategoryId>1</CategoryId>
                        </searchParams>
                        <returnProperties>
                            <string>Id</string>
                            <string>Name</string>
                            <string>Price</string>
                        </returnProperties>
                    </GetProducts>
                </soap:Body>
            </soap:Envelope>';
        $response = $SoapService->call('https://api.24sevenoffice.com/Logistics/Product/V001/ProductService.asmx', $xml);
        try {
            return xmlToArray($response)['soap:Envelope']['soap:Body']['GetProductsResponse']['GetProductsResult']['Product'];
        } catch (\Throwable $th) {
            return [];
        }
    }
    public function SaveInvoices($data, $project_id)
    {
        $project = Project::with('Customer')->find($project_id);
        $invoices = [];
        foreach ($data as $key => $invoice) {
            $invoices[]['InvoiceOrder'] = [
                'DateInvoiced' => Carbon::parse(str_replace('/', '-', $invoice->invoice_date))->format('Y-m-d'), //2023-07-13
                'CustomerId'   => $project->Customer->customer_24_seven_id ?? 12,
                'OrderStatus'  => 'Invoiced',
                'InvoiceRows' => [
                    'InvoiceRow' => [
                        "ProductId" => $invoice->project_24_id,
                        "Price"     => $invoice->amount,
                        "Name"      => $invoice->invoice_name ?? "Test",
                        "Quantity"  => 1
                    ]
                ]
            ];
        }
        $body  = arrayToXml('invoices', $invoices);
        $SoapService = new SoapService();
        $xml = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                    <soap:Body>
                        <SaveInvoices xmlns="http://24sevenOffice.com/webservices">
                        ' . $body . '
                        </SaveInvoices>
                    </soap:Body>
                </soap:Envelope>';
        $xml      = str_replace(array("\r", "\n"), '', $xml);
        $response = $SoapService->call(config('24-seven-office.InvoiceService.url'), $xml);
        $response = xmlToArray($response);
        $InvoiceResponse = $response['soap:Envelope']['soap:Body']['SaveInvoicesResponse']['SaveInvoicesResult']['InvoiceOrder'];
        $insertInvoice  = [];
        foreach ($InvoiceResponse as $key => $row) {
            $insertInvoice[] = [
                'project_id'     => $project_id,
                'product_id'     => $row['InvoiceRows']['InvoiceRow']['ProductId'],
                'order_id'       => $row['OrderId'],
                'customer_24_id' => $row['CustomerId'],
                'order_status'   => $row['OrderStatus'],
                'invoice_id'     => $row['InvoiceId'],
                'date_invoiced'  => SetDateFormat($row['DateInvoiced']),
                'price'          => $row['InvoiceRows']['InvoiceRow']['Price'],
                'name'           => $row['InvoiceRows']['InvoiceRow']['Name'],
                'quantity'       => $row['InvoiceRows']['InvoiceRow']['Quantity'],
            ];
        }
        LiveProjectInvoice::insert($insertInvoice);
        return response()->json([
            'status'   => true,
            'response' => $response
        ]);
        try {
        } catch (\Throwable $th) {
            return response()->json([
                'status'   => false,
                'response' => $response
            ]);
        }
    }

    public function SaveSingleInvoices($data, $project_id)
    {
        $invoices['InvoiceOrder'] = [
            'DateInvoiced' => Carbon::parse(str_replace('/', '-', $data['DateInvoiced']))->format('Y-m-d'), //2023-07-13
            'CustomerId'   => $data['CustomerId'],
            'OrderStatus'  => 'Invoiced',
            'InvoiceRows' => [
                'InvoiceRow' => [
                    "ProductId" =>  $data['ProductId'],
                    "Price"     =>  $data['Price'],
                    "Name"      =>  $data['Name'],
                    "Quantity"  => 1
                ]
            ]
        ];
        $body  = arrayToXml('invoices', $invoices);
        $SoapService = new SoapService();
        $xml = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                    <soap:Body>
                        <SaveInvoices xmlns="http://24sevenOffice.com/webservices">
                        ' . $body . '
                        </SaveInvoices>
                    </soap:Body>
                </soap:Envelope>';
        $xml      = str_replace(array("\r", "\n"), '', $xml);
        try {
            $response = $SoapService->call(config('24-seven-office.InvoiceService.url'), $xml);
            $response = xmlToArray($response);
            $InvoiceResponse = $response['soap:Envelope']['soap:Body']['SaveInvoicesResponse']['SaveInvoicesResult']['InvoiceOrder'];
            $insertInvoice  = [
                'type'           => 'VO',
                'project_id'     => $project_id,
                'product_id'     => $InvoiceResponse['InvoiceRows']['InvoiceRow']['ProductId'],
                'order_id'       => $InvoiceResponse['OrderId'],
                'customer_24_id' => $InvoiceResponse['CustomerId'],
                'order_status'   => $InvoiceResponse['OrderStatus'],
                'invoice_id'     => $InvoiceResponse['InvoiceId'],
                'date_invoiced'  => SetDateFormat($InvoiceResponse['DateInvoiced']),
                'price'          => $InvoiceResponse['InvoiceRows']['InvoiceRow']['Price'],
                'name'           => $InvoiceResponse['InvoiceRows']['InvoiceRow']['Name'],
                'quantity'       => $InvoiceResponse['InvoiceRows']['InvoiceRow']['Quantity'],
            ];
            return  LiveProjectInvoice::create($insertInvoice);
        } catch (\Throwable $th) {
           return false;
        }
    }

    public function CompanyService($customer, $request)
    {
        if (is_null(token24Seven())) {
            $this->credential();
        }
        $SoapService = new SoapService();
        $xml = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <soap:Body>
                        <SaveCompanies xmlns="http://24sevenOffice.com/webservices">
                            <companies>
                                <Company>
                                    <FirstName>' . $customer->first_name . '</FirstName>
                                    <Name>' . $request['company_name'] . '</Name>
                                    <OrganizationNumber>' . $request['organization_no'] . '</OrganizationNumber>
                                    <NickName>' . $customer->last_name . '</NickName>
                                    <Type>Business</Type>
                                </Company>
                            </companies>
                        </SaveCompanies>
                    </soap:Body>
                </soap:Envelope>';
        $xml      = str_replace(array("\r", "\n"), '', $xml);
        $response = $SoapService->call(config('24-seven-office.CompanyService.url'), $xml);
        $response = xmlToArray($response);
        return $response['soap:Envelope']['soap:Body']['SaveCompaniesResponse']['SaveCompaniesResult']['Company'];
    }
}
