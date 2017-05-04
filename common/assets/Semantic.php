<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 12/1/16
 * Time: 11:44 AM
 */

namespace common\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;
use Zelenin\yii\SemanticUI\assets\SemanticUICSSAsset;
use Zelenin\yii\SemanticUI\assets\SemanticUIJSAsset;

/**
 * Class Semantic
 * @package common\assets
 *
 * php composer.phar require zelenin/yii2-semantic-ui "~2" at first
 *
\Yii::$container->set(\yii\grid\GridView::className(), \Zelenin\yii\SemanticUI\widgets\GridView::className());
\Yii::$container->set(\yii\widgets\ActiveForm::className(), \Zelenin\yii\SemanticUI\widgets\ActiveForm::className());
\Yii::$container->set(\yii\bootstrap\ActiveForm::className(), \Zelenin\yii\SemanticUI\widgets\ActiveForm::className());
\Yii::$container->set(\yii\widgets\Breadcrumbs::className(), \Zelenin\yii\SemanticUI\collections\Breadcrumb::className());
\Yii::$container->set(\yii\grid\CheckboxColumn::className(), \Zelenin\yii\SemanticUI\widgets\CheckboxColumn::className());
 */
class Semantic extends AssetBundle
{
    public function init()
    {
        parent::init();
        $this->depends = [
            YiiAsset::className(),
            JqueryAsset::className(),
            SemanticUICSSAsset::className(),
            SemanticUIJSAsset::className(),
        ];
    }
}