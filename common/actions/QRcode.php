<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-5
 * Time: 上午9:49
 */

namespace common\actions;


use yii\base\Action;

class QRcode extends Action
{
    public $data;

    public function run()
    {
        \dosamigos\qrcode\QrCode::png($this->data);
    }
}