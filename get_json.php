<?php
$url = 'https://alfabank.ru/ext-json/0.2/exchange/cash?offset=0&limit=1&mode=rest'; 
if($curl = curl_init()) { 
    curl_setopt($curl,CURLOPT_URL, $url); 
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30); 
    curl_setopt($curl,CURLOPT_USERAGENT,'modesto-finance.com');
    $json = json_decode(curl_exec($curl));
    curl_close($curl);
}

$usd = $json->usd;
$eur = $json->eur;

foreach($usd as $value) {
    if($value->type == "sell") {
        $usd_sell = number_format($value->value, 2, ',', '');
        break;
    }
}

foreach($eur as $value) {
    if($value->type == "sell") {
        $eur_sell = number_format($value->value, 2, ',', '');
        break;
    }
}

echo "$usd_sell\n$eur_sell\n";