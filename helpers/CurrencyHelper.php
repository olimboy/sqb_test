<?php

namespace app\helpers;

use app\models\Currency;

class CurrencyHelper
{
    const URL = 'http://www.cbr.ru/scripts/XML_daily.asp';

    public static function getByDate($date)
    {
        $xml_string = file_get_contents(sprintf('%s?date_req=%s', self::URL, $date));
        $xml = new \SimpleXMLElement($xml_string);
        $json_string = json_encode($xml);
        $currencies = json_decode($json_string, TRUE);
        $currency_date = date("Y-m-d", strtotime($currencies['@attributes']['Date']));
        $currencies_array = [];
        foreach ($currencies['Valute'] as $valute) {
            $currencies_array[] = [
                'valuteID' => $valute['@attributes']['ID'],
                'numCode' => $valute['NumCode'],
                'charCode' => $valute['CharCode'],
                'name' => $valute['Name'],
                'value' => $valute['Value'],
                'date' => $currency_date
            ];
        }
        return $currencies_array;
    }

    public static function saveToDB($currencies){
        $count = 0;
        foreach ($currencies as $currency_array){
            $currency = new Currency($currency_array);
            if ($currency->save()){
                $count++;
            }
        }
        return $count;
    }
}