<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
\frontend\assets\site\IndexAsset::register($this)
?>
<div class="site-index">

    <div id="categorys_and_ads">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-3">1</div>
                    <div class="col-sm-3">2</div>
                    <div class="col-sm-3">3</div>
                    <div class="col-sm-3">4</div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="advertisement">
                    <?php
                    echo \yii\bootstrap\Carousel::widget([
                        'controls' => [
                            '<span class="glyphicon glyphicon-chevron-left"></span>',
                            '<span class="glyphicon glyphicon-chevron-right"></span>',
                        ],
                        'items'=>[
                            ['content' => \yii\helpers\Html::img('http://7xsbq6.com1.z0.glb.clouddn.com/1140480.png')],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur.</p>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur.</p>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur.</p>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>
                </p>
            </div>
        </div>
    </div>
</div>
