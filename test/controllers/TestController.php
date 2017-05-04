<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 2017/2/21
 * Time: 10:46
 */

namespace test\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        if(\Yii::$app->wechat->isWechat && !\Yii::$app->wechat->isAuthorized()) {
            return \Yii::$app->wechat->authorizeRequired()->send();
        }
    }

    /**
     * rsa encrypt and decrypt
     */
    public function actionTest1()
    {
        $private_key1 = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQC6pu3uOwDsnn2+OfoN+5tTvJUnW5lVQ5NZLDgv9/64aEWqrp/s
6qOISTgn0ytJk0MqUVgDiCdOUc4sqKtVOYbo4E7k2T7BcLglWFyIWoD4SipfV9QH
gYMAnTeTi+E86q1oBTWgfwPMXgOQm+gumKKPU7m7K84U7MvPHZoiDG5G3wIDAQAB
AoGATB6ds+UeOGFeeICeaKtuqhSjY1yoyKv5YIl3FKD3oW7s0nHKyMzcCk2J+DvX
UHcdEhoAYdhZ50fXZEEZNnVyfb3qG9EOtFoQJqU6FE/AFHy1IGPFch1JMeD7xNLx
OzklPTgwcwuHrDptnwS27KZCGVu1Ey+a+4We1UM3Wbar2RECQQDi0z71SIWAj0CV
Kzf0r5Z+feL1z0DxYLjGbYkrNu2DMasbDj4dMSFRiOv9drR2BTLswGWClajHpkPG
rzVMCvMHAkEA0qjjl6zP9Eryhd1/ntpkmDGnBs5JHkOGgiE2+iD0kb+CvcpKT93D
Hj0d/galgQ82b4OAxrD5XLnu0c+0MPdfaQJASIPwpMpCpA8oPohKo1dfbaEhZiSU
Rpb9e7KZH8+3rzG52jR7dym11TNI/wdsOi7/UOFRkqX2B54IHQT2rRDzEQJAfxLL
v1nKU7XGGAQmEL/ywG/rLkrPhob7I5I/pKCuhyC8EBpvuz+tjJcXeX2u5mwzzQ7J
ZpGoykuKiVu+eW8vSQJBAK+V7pmKBQcvxmd1GzTEVUqKXFMgt6ZdPjkOmQMDr8uy
qF1asY1QegKTEGhRkjloTAhAdJWWmJf1lF+KWUu9RTc=
-----END RSA PRIVATE KEY-----';
        $public_key1 = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC6pu3uOwDsnn2+OfoN+5tTvJUn
W5lVQ5NZLDgv9/64aEWqrp/s6qOISTgn0ytJk0MqUVgDiCdOUc4sqKtVOYbo4E7k
2T7BcLglWFyIWoD4SipfV9QHgYMAnTeTi+E86q1oBTWgfwPMXgOQm+gumKKPU7m7
K84U7MvPHZoiDG5G3wIDAQAB
-----END PUBLIC KEY-----';

        $pi_key = openssl_pkey_get_private($private_key1);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
        $pu_key = openssl_pkey_get_public($public_key1);//这个函数可用来判断公钥是否是可用的
        $data = 'wodrow';
        $encrypted = "";
        $decrypted = "";

        openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密
        $encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
        openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);//私钥加密的内容通过公钥可用解密出来
        echo $decrypted,"<br>";

        openssl_public_encrypt($data,$encrypted,$pu_key);//公钥加密
        $encrypted = base64_encode($encrypted);
        openssl_private_decrypt(base64_decode($encrypted),$decrypted,$pi_key);//私钥解密
        echo $decrypted,"<br>";
    }
}