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
                                <Password>Acc@psd!2dh</Password>
                                <Username>john@pixel-studios.com</Username>
                            </credential>
                        </Login>
                    </soap:Body>
                </soap:Envelope>'
    ],

];
