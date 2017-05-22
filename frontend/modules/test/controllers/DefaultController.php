<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 上午10:33
 */

namespace frontend\modules\test\controllers;


use yii\web\Controller;
use GDText\Box;
use GDText\Color;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $im = imagecreatetruecolor(200, 200);
        $backgroundColor = imagecolorallocate($im, 0, 18, 64);
        imagefill($im, 0, 0, $backgroundColor);
        $box = new Box($im);
        $box->setFontFace(\Yii::getAlias('@common/fonts/fanti.ttf')); // http://www.dafont.com/pacifico.font
            $box->setFontSize(80);
        $box->setFontColor(new Color(255, 75, 140));
        $box->setTextShadow(new Color(0, 0, 0, 50), 0, 0);
        $box->setBox(0, 0, 200, 200);
        $box->setTextAlign('center', 'center');
        $box->draw("我的");
        header("Content-type: image/png");
        imagepng($im);
    }

    public function actionTest()
    {
        return $this->render('test');
    }

    public function actionTest2()
    {
        return $this->render('test2');
    }
}