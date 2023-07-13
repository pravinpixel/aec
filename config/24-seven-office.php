<?php

return [
    "authenticate" => [
        'url' => 'https://api.24sevenoffice.com/authenticate/v001/authenticate.asmx',
        'body' => '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                    <soap:Body>
                        <Login xmlns="http://24sevenOffice.com/webservices">
                            <credential>
                                <ApplicationId>0525876d-feb7-4d7c-964b-a5315b53185c</ApplicationId>
                                <IdentityId>00000000-0000-0000-0000-000000000000</IdentityId>
                                <Password>' . env('PASSWORD_24_SEVEN') . '</Password>
                                <Username>' . env('USER_NAME_24_SEVEN') . '</Username>
                            </credential>
                        </Login>
                    </soap:Body>
                </soap:Envelope>'
    ],
    'createCustomer' => [
        'url' => 'https://api.24sevenoffice.com/CRM/Company/V001/CompanyService.asmx',
        'body' => '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
          <soap:Body>
            <SaveCompanies xmlns="http://24sevenOffice.com/webservices">
              <companies>
                <Company>
                    <Name>Surya 2</Name>
                    <Type>Business</Type>
                </Company>
              </companies>
            </SaveCompanies>
          </soap:Body>
        </soap:Envelope> '
    ],
    'productService' => [
        'url' => 'https://api.24sevenoffice.com/Logistics/Product/V001/ProductService.asmx',
        'body' => '<?xml version="1.0" encoding="utf-8"?>
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
        </soap:Envelope>'
    ],
    'InvoiceService' => [
        'url' => 'https://api.24sevenoffice.com/Economy/InvoiceOrder/V001/InvoiceService.asmx',
    ]
];
