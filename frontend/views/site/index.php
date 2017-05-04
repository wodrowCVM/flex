<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-3
 * Time: 下午4:41
 */

\common\assets\CreateJs::register($this);
?>

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