<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuiaController extends Controller
{
    public function index(){
    	$data = '
<?xml version="1.0" encoding="UTF-8"?>
<req:ShipmentRequest xmlns:req="http://www.dhl.com" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com ship-val-global-req.xsd" schemaVersion="5.0">
                <Request>
                               <ServiceHeader>
                                               <MessageTime>2001-12-17T09:30:47-05:00</MessageTime>
                                               <MessageReference>1234567890123456789012345678901</MessageReference>

            <SiteID>v62_feJ93XJ4mD</SiteID>
            <Password>PDtnrS6xyG</Password>
                               </ServiceHeader>
                </Request>
                <RegionCode>AM</RegionCode>
                <RequestedPickupTime>Y</RequestedPickupTime>
                <NewShipper>Y</NewShipper>
                <LanguageCode>en</LanguageCode>
                <PiecesEnabled>Y</PiecesEnabled>
                <Billing>
                               <ShipperAccountNumber>753871175</ShipperAccountNumber>
                               <ShippingPaymentType>S</ShippingPaymentType>
                               <BillingAccountNumber>753871175</BillingAccountNumber>
                               <DutyPaymentType>S</DutyPaymentType>
                               <DutyAccountNumber>753871175</DutyAccountNumber>
                </Billing>
                <Consignee>
                               <CompanyName>IBM Singapore Pte Ltd</CompanyName>
                               <AddressLine>9 Changi Business Park Central 1</AddressLine>
                               <AddressLine>3th Floor</AddressLine>                            
                               <AddressLine>The IBM Place</AddressLine>
                               <City>Singapore</City>
                               <PostalCode>486048</PostalCode>
                               <CountryCode>SG</CountryCode>
                               <CountryName>Singapore</CountryName>
                               <Contact>
                                               <PersonName>Mrs Orlander</PersonName>
                                               <PhoneNumber>506-851-2271</PhoneNumber>
                                               <PhoneExtension>7862</PhoneExtension>
                                               <FaxNumber>506-851-7403</FaxNumber>
                                               <Telex>506-851-7121</Telex>
                                               <Email>anc@email.com</Email>
                               </Contact>
                </Consignee>
                <Commodity>
                               <CommodityCode>cc</CommodityCode>
                               <CommodityName>cn</CommodityName>
                </Commodity>
                <Dutiable>
                               <DeclaredValue>200.00</DeclaredValue>
                               <DeclaredCurrency>USD</DeclaredCurrency>
                               <ScheduleB>3002905110</ScheduleB>
                               <ExportLicense>D123456</ExportLicense>
                               <ShipperEIN>112233445566</ShipperEIN>
                               <ShipperIDType>S</ShipperIDType>
                               <ImportLicense>ImportLic</ImportLicense>
                               <ConsigneeEIN>ConEIN2123</ConsigneeEIN>
                               <TermsOfTrade>DAP</TermsOfTrade>
                </Dutiable>
                <Reference>
                               <ReferenceID>AM international shipment</ReferenceID>
                               <ReferenceType>St</ReferenceType>
                </Reference>
                <ShipmentDetails>
                               <NumberOfPieces>1</NumberOfPieces>
                               <Pieces>
                                               <Piece>
                                                               <PieceID>1</PieceID>
                                                               <PackageType>EE</PackageType>
                                                               <Weight>10.0</Weight>
                                                               <DimWeight>1200.0</DimWeight>
                                                               <Width>100</Width>
                                                               <Height>200</Height>
                                                               <Depth>300</Depth>
                                               </Piece>
                               </Pieces>
                               <Weight>10.0</Weight>
                               <WeightUnit>L</WeightUnit>
                               <GlobalProductCode>P</GlobalProductCode>
                               <LocalProductCode>P</LocalProductCode>
                               <Date>2019-06-07</Date>
                               <Contents>AM international shipment contents</Contents>
                               <DoorTo>DD</DoorTo>
                               <DimensionUnit>I</DimensionUnit>
                               <InsuredAmount>1200.00</InsuredAmount>
                               <PackageType>EE</PackageType>
                               <IsDutiable>Y</IsDutiable>
                               <CurrencyCode>USD</CurrencyCode>
                </ShipmentDetails>
                <Shipper>
                               <ShipperID>751008818</ShipperID>
                               <CompanyName>IBM Corporation</CompanyName>
                               <RegisteredAccount>751008818</RegisteredAccount>
                               <AddressLine>1 New Orchard Road</AddressLine>
                               <AddressLine>Armonk</AddressLine>
                               <City>New York</City>
                               <Division>ny</Division>
                               <DivisionCode>ny</DivisionCode>
                               <PostalCode>10504</PostalCode>
                               <CountryCode>US</CountryCode>
                               <CountryName>United States Of America</CountryName>
                               <Contact>
                                               <PersonName>Mr peter</PersonName>
                                               <PhoneNumber>1 905 8613402</PhoneNumber>
                                               <PhoneExtension>3403</PhoneExtension>
                                               <FaxNumber>1 905 8613411</FaxNumber>
                                               <Telex>1245</Telex>
                                               <Email>test@email.com</Email>
                               </Contact>
                </Shipper>
                <SpecialService>
                               <SpecialServiceType>A</SpecialServiceType>
                </SpecialService>
                <SpecialService>
                               <SpecialServiceType>I</SpecialServiceType>
                </SpecialService>
                <EProcShip>N</EProcShip>
                <LabelImageFormat>PDF</LabelImageFormat>
</req:ShipmentRequest>';

$tuCurl = curl_init();
curl_setopt($tuCurl, CURLOPT_URL, "https://xmlpi-ea.dhl.com/XMLShippingServlet");
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HEADER, 0);
curl_setopt($tuCurl, CURLOPT_POST, 1);
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));

$tuData = curl_exec($tuCurl);
curl_close($tuCurl);
$simple = $tuData;
$xml = simplexml_load_string($tuData);
json_encode($xml);
//print_r($xml);
$code = $xml->DHLRoutingCode;
$code =str_replace('+', '' , $code);
$prue = $xml->LabelImage->OutputImage;

//Get File content from txt file

$pdf_decoded = base64_decode ($prue);
//Write data back to pdf file
$pdf = fopen ('storage/'.$code.'.pdf','w');
fwrite ($pdf,$pdf_decoded);
//close output file
fclose ($pdf);



return view('guia', compact('code'));

    }
}