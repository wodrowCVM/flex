<?php
$x = time();
if (Yii::$app->request->isPjax) {
    $x = date("Y-m-d H:i:s");
}
?>

<button id="testb">testb</button>
<div id="content">
    <a class="testa" href="/test/default/test3">testa</a>.
    <?= $x ?>
</div>

<?php \yii\widgets\Pjax::begin(['id' => 'pjaxy']); ?>
<a id="testy">testy</a>
<?= $x ?>
<?php \yii\widgets\Pjax::end(); ?>

<?php \common\components\jsblock\JsBlock::begin(); ?>
<script>
    //    $(document).pjax('a.testy', '#pjaxy', {fragment:'#pjaxy', timeout:30000});
    $(document).pjax('a.testa', '#content', {fragment: '#content', timeout: 30000});
    //    $.pjax('a.test', '#content', {fragment:'#content', timeout:30000});
    //    $.pjax({
    //        selector: 'a.test',
    //        container:'#content',
    //        fragment:'#content',
    //        timeout:30000
    //    });
    $(function () {
        $("button#testb").click(function () {
            $("a.testa").trigger('click');
//            $.pjax({
//                selector: 'a.test',
//                container: '#yii2p',
//                fragment: '#yii2p',
//                timeout: 30000
//            });
        })
    })
</script>
<?php \common\components\jsblock\JsBlock::end(); ?>
