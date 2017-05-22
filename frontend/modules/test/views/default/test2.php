<?php
$x = time();
if (Yii::$app->request->isPjax) {
    $x = date("Y-m-d H:i:s");
}
?>

<button id="testb">testb</button>
<?php //\yii\widgets\Pjax::begin(['id' => "pjax-container"]); ?>
Go to <a class="test" href="/test/default/test2">next page</a>.
<div id="content">
    <?= $x ?>
</div>
<?php //\yii\widgets\Pjax::end(); ?>




<?php \common\components\jsblock\JsBlock::begin(); ?>
<script>
    //    $(document).pjax('a.test', '#content', {fragment:'#content', timeout:30000});
    //    $.pjax('a.test', '#content', {fragment:'#content', timeout:30000});
    //    $.pjax({
    //        selector: 'a.test',
    //        container:'#content',
    //        fragment:'#content',
    //        timeout:30000
    //    });
    $(function () {
        $("button#testb").click(function () {
            $.pjax({
                selector: 'a.test',
                container: '#content',
                fragment: '#content',
                timeout: 30000
            });
        })
    })
</script>
<?php \common\components\jsblock\JsBlock::end(); ?>
