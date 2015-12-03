<?php die(); ?>
[01-Dec-2015 23:23:21] (shop: 01-Dec-2015 23:23:20) PAYMENTS message:
    Payment processing failure.
    Login: 
    IP: 103.44.164.117
    ----
    Payment method: PayPal Pro: ExpressCheckout (PayPal Pro)
    bill_output = Array
    (
        [cvvmes] => not set / 
        [code] => 2
        [billmes] => Declined Status:  Error: Payment has already been made for this InvoiceID. (Code: 10412, Severity: )
    )
    original_bill_output = Array
    (
        [cvvmes] => not set / 
        [code] => 2
        [billmes] => Declined Status:  Error: Payment has already been made for this InvoiceID. (Code: 10412, Severity: )
    )
    responses of https requests = Array
    (
        [31-12-1969 18:00:00 1449033801] => Array
            (
                [0] => HTTP/1.1 100 Continue
    HTTP/1.1 200 OK
    Date: Wed, 02 Dec 2015 05:26:01 GMT
    Server: Apache
    X-PAYPAL-OPERATION-NAME: DoExpressCheckoutPayment
    X-PAYPAL-API-RC: 10412
    Connection: close
    Cache-Control: max-age=0, no-cache, no-store, must-revalidate
    Pragma: no-cache
    Content-Length: 2279
    Paypal-Debug-Id: bfadd7b3b82a4
    Set-Cookie: X-PP-SILOVER=name%3DLIVE6.APIT.1%26silo_version%3D880%26app%3Dappdispatcher_apit%26TIME%3D3917504086; domain=.paypal.com; path=/; Secure; HttpOnly
    Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
    Cache-Control: max-age=0, no-cache, no-store, must-revalidate
    Pragma: no-cache
    Content-Type: text/xml; charset=utf-8
    
                [1] => <?xml version="1.0" encoding="UTF-8"?><SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:cc="urn:ebay:apis:CoreComponentTypes" xmlns:wsu="http://schemas.xmlsoap.org/ws/2002/07/utility" xmlns:saml="urn:oasis:names:tc:SAML:1.0:assertion" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext" xmlns:ed="urn:ebay:apis:EnhancedDataTypes" xmlns:ebl="urn:ebay:apis:eBLBaseComponents" xmlns:ns="urn:ebay:api:PayPalAPI"><SOAP-ENV:Header><Security xmlns="http://schemas.xmlsoap.org/ws/2002/12/secext" xsi:type="wsse:SecurityType"></Security><RequesterCredentials xmlns="urn:ebay:api:PayPalAPI" xsi:type="ebl:CustomSecurityHeaderType"><Credentials xmlns="urn:ebay:apis:eBLBaseComponents" xsi:type="ebl:UserIdPasswordType"><Username xsi:type="xs:string"></Username><Password xsi:type="xs:string"></Password><Signature xsi:type="xs:string"></Signature><Subject xsi:type="xs:string"></Subject></Credentials></RequesterCredentials></SOAP-ENV:Header><SOAP-ENV:Body id="_0"><DoExpressCheckoutPaymentResponse xmlns="urn:ebay:api:PayPalAPI"><Timestamp xmlns="urn:ebay:apis:eBLBaseComponents">2015-12-02T05:26:02Z</Timestamp><Ack xmlns="urn:ebay:apis:eBLBaseComponents">Failure</Ack><CorrelationID xmlns="urn:ebay:apis:eBLBaseComponents">bfadd7b3b82a4</CorrelationID><Errors xmlns="urn:ebay:apis:eBLBaseComponents" xsi:type="ebl:ErrorType"><ShortMessage xsi:type="xs:string">Duplicate invoice</ShortMessage><LongMessage xsi:type="xs:string">Payment has already been made for this InvoiceID.</LongMessage><ErrorCode xsi:type="xs:token">10412</ErrorCode><SeverityCode xmlns="urn:ebay:apis:eBLBaseComponents">Error</SeverityCode></Errors><Version xmlns="urn:ebay:apis:eBLBaseComponents">60.0</Version><Build xmlns="urn:ebay:apis:eBLBaseComponents">18308778</Build><DoExpressCheckoutPaymentResponseDetails xmlns="urn:ebay:apis:eBLBaseComponents" xsi:type="ebl:DoExpressCheckoutPaymentResponseDetailsType"></DoExpressCheckoutPaymentResponseDetails></DoExpressCheckoutPaymentResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
            )
    
    )
Request URI: /payment/payment_cc.php
Backtrace:
/home/congcewa/public_html/payment/payment_ccmid.php:453
/home/congcewa/public_html/payment/payment_ccend.php:48
/home/congcewa/public_html/payment/ps_paypal_pro_us.php:491
/home/congcewa/public_html/payment/ps_paypal_pro.php:97
/home/congcewa/public_html/payment/payment_cc.php:303
-------------------------------------------------
