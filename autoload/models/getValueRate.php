<?php
namespace models;

class getValueRate{
    private static function getJson($url)
    {
        if($curl = curl_init()) { 
            curl_setopt($curl,CURLOPT_URL, $url); 
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
            curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30); 
            curl_setopt($curl,CURLOPT_USERAGENT,'modesto-finance.com');
            $json = json_decode(curl_exec($curl));
            curl_close($curl);
        }
        return $json;
    }

    public static function getValues()
    {
        $json = getValueRate::getJson('https://alfabank.ru/ext-json/0.2/exchange/cash?offset=0&limit=1&mode=rest');

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

        $arrayValues = [
            "usd" => $usd_sell,
            "eur" => $eur_sell
        ];

        return $arrayValues;
    }
}