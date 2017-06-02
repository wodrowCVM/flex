<?php
$x = time();
if (Yii::$app->request->isPjax) {
    $x = date("Y-m-d H:i:s");
}
?>
<code>
    { "background":{ "r":<?=rand(0,255) ?>, "g":<?=rand(0,255) ?>, "b":<?=rand(0,255) ?> } , "color":{ "r":<?=rand(0,255) ?>, "g":<?=rand(0,255) ?>, "b":<?=rand(0,255) ?> }}
</code>
