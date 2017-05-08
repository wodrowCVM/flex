<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 上午11:12
 */

namespace common\actions;


use GDText\Box;
use GDText\Color;
use yii\base\Action;

class Avatar extends Action
{
//    public $text;
//    public $rule;

    public function run()
    {
        $user = \Yii::$app->user->identity;
        $user_info = $user->userInfo;
        $rule = $user_info->levelRule->avatar_rule;
        $rule = json_decode($rule);
//        $avatar = $user_info->avatar?$user_info->avatar:substr($user->username, 0, 2);
        $im = imagecreatetruecolor(100, 100);
        $backgroundColor = imagecolorallocate($im, $rule->background->r, $rule->background->g, $rule->background->b);
        imagefill($im, 0, 0, $backgroundColor);
        $box = new Box($im);
        $box->setFontFace(\Yii::getAlias('@common/fonts/fanti.ttf')); // http://www.dafont.com/pacifico.font
        $box->setFontSize(40);
        $box->setFontColor(new Color($rule->color->r, $rule->color->g, $rule->color->b));
//        $box->setTextShadow(new Color(0, 0, 0, 50), 0, 0);
        $box->setBox(0, 0, 100, 100);
        $box->setTextAlign('center', 'center');
        $box->draw($user_info->avatar);
        header("Content-type: image/png");
        imagepng($im);
    }
}