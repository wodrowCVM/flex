<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:43
 * @var \yii\web\View $this
 */
$this->beginContent('@frontend/views/layouts/main.php');
$this->registerCssFile('@web/css/user/user.less');
?>

<?=$content ?>


<?php $this->endContent() ?>