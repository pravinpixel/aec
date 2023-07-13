<?php

namespace App\Http\Controllers;

use App\Services\SoapService;

class SoapController extends Controller
{

    public function credential()
    {
        $url = config('24-seven-office.authenticate.url');
        $body = config('24-seven-office.authenticate.body');
        $SoapService = new SoapService();
        try {
            $response    = $SoapService->call($url, $body);
            $login_token = formatXml($response);
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

        $xml = '
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
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
            </soap:Envelope>
        ';

        $response = $SoapService->call('https://api.24sevenoffice.com/Logistics/Product/V001/ProductService.asmx', $xml);
        $result = formatXml($response);
        return response()->json([
            'response' => $result
        ]);
    }
    public function SaveInvoices($data)
    {
        $invoices = [];
        
        foreach ($data as $key => $invoice) {
            $invoices[]['InvoiceRow'] = [
                "ProductId" => $invoice->project_24_id,
                "Price"     => $invoice->amount,
                "Name"      => "Test Invoice " . $key + 1,
                "Quantity"  => 1
            ];
        } 
        $body  = arrayToXml('InvoiceRows', $invoices);
        $SoapService = new SoapService();
        $xml = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <SaveInvoices xmlns="http://24sevenOffice.com/webservices">
                    <invoices>
                        <InvoiceOrder>
                            <DateInvoiced>2023-06-29</DateInvoiced>
                            <CustomerId>12</CustomerId>
                            <OrderStatus>Invoiced</OrderStatus>
                            ' . $body . '
                        </InvoiceOrder>
                    </invoices>
                </SaveInvoices>
            </soap:Body>
        </soap:Envelope>';
        $xml = str_replace(array("\r", "\n"), '', $xml);
        try {
            $response = $SoapService->call(config('24-seven-office.InvoiceService.url'), $xml);
            return response()->json([
                'status'   => true,
                'response' => $response
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'   => false,
                'response' => $response
            ]);
        }
    }
}
