<?php
$url = 'https://alfabank.ru/ext-json/0.2/exchange/cash?offset=0&limit=1&mode=rest'; 
if($curl = curl_init()) { 
    curl_setopt($curl,CURLOPT_URL, $url); 
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30); 
    curl_setopt($curl,CURLOPT_USERAGENT,'modesto-finance.com');
    $json = curl_exec($curl);
    curl_close($curl);
}
echo $json;