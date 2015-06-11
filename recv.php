<?php

require 'twilio-php/Services/Twilio.php';

$btcjsondata = file_get_contents('https://blockchain.info/ticker');
$btcjson = json_decode($btcjsondata, true);
$btcprice = $btcjson['USD']['last'];
$altjsondata = file_get_contents('https://poloniex.com/public?command=returnTicker');
$altjson = json_decode($altjsondata, true);
$opalprice = $altjson['BTC_OPAL']['last'];
$btcdprice = $altjson['BTC_BTCD']['last'];
$fibreprice = $altjson['BTC_FIBRE']['last'];
$unityprice = $altjson['BTC_UNITY']['last'];
$sysprice = $altjson['BTC_SYS']['last'];
$cryptsyjsondata = file_get_contents('https://bittrex.com/api/v1.1/public/getticker?market=btc-blitz');
$cryptsyjson = json_decode($cryptsyjsondata, true);
$blitzprice = $cryptsyjson['result']['Last'];
function index(){
    $response = new Services_Twilio_Twiml();
    $response->sms("Reply with one of the following keywords: 
btc, opal, fibre, blitz, unity, sys, btcd");
    echo $response;
}
function btc(){
    global $btcprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($btcprice);
    echo $response;
}
 
function opal(){
    global $opalprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($opalprice);
    echo $response;
}

function fibre(){
    global $fibreprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($fibreprice);
    echo $response;
}

function blitz(){
    global $blitzprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($blitzprice);
    echo $response;
}

function unity(){
    global $unityprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($unityprice);
    echo $response;
}

function sys(){
    global $sysprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($sysprice);
    echo $response;
}

function btcd(){
    global $btcdprice;
    $response = new Services_Twilio_Twiml();
    $response->sms($btcdprice);
    echo $response;
}

/* Read the contents of the 'Body' field of the Request. */
$body = $_REQUEST['Body'];
 
/* Remove formatting from $body until it is just lowercase 
characters without punctuation or spaces. */
$result = preg_replace("/[^A-Za-z0-9]/u", " ", $body);
$result = trim($result);
$result = strtolower($result);
 
switch ($result) {
    case 'btc':
        btc();
        break;
    case 'opal':
        opal();
        break;
    case 'btcd':
        btcd();
        break;
    case 'blitz':
        blitz();
        break;
    case 'fibre':
        fibre();
        break;
    case 'unity':
        unity();
        break;
    case 'sys':
        sys();
        break;
    default:
        index();
}?>
