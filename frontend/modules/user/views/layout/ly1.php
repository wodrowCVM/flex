<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:43
 * @var \yii\web\View $this
 */
$this->registerCssFile('@web/css/user/user.less');
$this->beginContent('@frontend/views/layouts/main.php');
?>

<?=$content ?>


<?php $this->endContent() ?>