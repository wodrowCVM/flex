<?php
/**
 * Created by chatfeed.
 * @Author:$Id$
 */

namespace common\components\curl;


class Curl
{

    public static function post($url,$postFields=array(),$header =[]){
        if(is_array($postFields)) $postFields = http_build_query($postFields);
        $ch         = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public static function get($url,$getFields=array()){
        $getFields = http_build_query($getFields);
        $ch         = curl_init();
        $url .='?'.$getFields;
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
}