<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

\common\assets\CreateJs::register($this);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>

<div class="row">
    <div class="col-lg-12">
        <canvas id="game"width="400"height="400" style="background: #ccc"></canvas>
    </div>
</div>

<?php
\common\components\jsblock\JsBlock::begin();
?>
<script>
    var stage = new createjs.Stage("game");
    stage.x = 100;
    stage.y = 100;
    var text = new createjs.Text("hello game");
    var circle = new createjs.Shape();
    circle.graphics.beginFill("#555555").drawCircle(0, 0, 50);
    stage.addChild(text);
    stage.addChild(circle);
    createjs.Tween.get(circle, {loop: true}).wait(1000).to({scaleX:0.2, scaleY:0.2}).wait(1000).to({scaleX:1, scaleY:1}, 1000, createjs.bounceInOut);
    createjs.Ticker.setFPS(20);
    createjs.Ticker.addEventListener('tick', stage);
    stage.update();
</script>
<?php
\common\components\jsblock\JsBlock::end();
?>
