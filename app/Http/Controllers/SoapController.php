<?php

namespace App\Http\Controllers;

use App\Services\SoapService;
use Illuminate\Http\Request;

class SoapController extends Controller
{
    protected $soapService;

    public function __construct(SoapService $soapService)
    {
        $this->soapService = $soapService;
    }
    public function credential(Request $request)
    {
        // Prepare the SOAP XML payload
        $xml = '
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <Login xmlns="http://24sevenOffice.com/webservices">
                    <credential>
                        <ApplicationId>0525876d-feb7-4d7c-964b-a5315b53185c</ApplicationId>
                        <IdentityId>00000000-0000-0000-0000-000000000000</IdentityId>
                        <Password>Acc@psd!2dh</Password>
                        <Username>john@pixel-studios.com</Username>
                    </credential>
                    </Login>
                </soap:Body>
            </soap:Envelope>
        ';
        // Make the SOAP call using the SoapService
        $xml = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><LoginResponse xmlns="http://24sevenOffice.com/webservices"><LoginResult>e0exmezsd0anarmouiw0aj1j</LoginResult></LoginResponse></soap:Body></soap:Envelope>');
        return $xml;
        dd($xml);
        $response = $this->soapService->call('https://api.24sevenoffice.com/authenticate/v001/authenticate.asmx', $xml);
        dd($response);
        
        $xmlResponse = simplexml_load_string($response);
        $result = $xmlResponse->xpath('/html/body/soap:envelope/soap:body/loginresponse/loginresult');

        // Return the parsed data
        return response()->json(['response' => $response]);
    }
    public function GetProducts()
    {
        // Prepare the SOAP XML payload
        $xml = '
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <GetProducts xmlns="http://24sevenOffice.com/webservices">
                        <searchParams>
                            <Id>1000</Id>
                            <CategoryId>1</CategoryId>
                        </searchParams>
                        <returnProperties>
                            <string>Name</string>
                            <string>Price</string>
                        </returnProperties>
                    </GetProducts>
                </soap:Body>
            </soap:Envelope>
        ';
        // Make the SOAP call using the SoapService
        $response = $this->soapService->call('https://api.24sevenoffice.com/Logistics/Product/V001/ProductService.asmx', $xml);

        // Process the SOAP response
        // ...
        return $response;
        return response()->json(['response' => $response]);
    }
    public function SaveInvoices()
    {
    }
}
