<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:51
 */
$user = Yii::$app->user->identity;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">个人信息</h2>
        <span class="pull-right"><a class="btn btn-xs" href="/user/setting/index" title="" data-toggle="tooltip"
                                    data-original-title="帐户设置"><i class="fa fa-cog"></i> </a></span>
    </div>
    <div class="panel-body">
        <ul class="user-info">
            <li><i class="fa fa-calendar fa-fw"></i> 注册日期：<?= date("Y-m-d", $user->created_at) ?></li>
            <!--            <li><i class="fa fa-sign-in fa-fw"></i> 最后登录：刚刚</li>-->
            <!--            <li><i class="fa fa-clock-o fa-fw"></i> 在线时长：65小时40分</li>-->
            <!--            <li><i class="fa fa-map-marker fa-fw"></i> China</li>-->
            <!--             <li><i class="fa fa-birthday-cake fa-fw"></i> 1990-03-29</li>-->
            <!--            <li><i class="fa fa-university fa-fw"></i> Sias University</li>-->
            <!--            <li><i class="fa fa-envelope-o fa-fw"></i> 1173957281@qq.com</li>-->
            <!--            <li><i class="fa fa-group fa-fw"></i> <a href="http://shang.qq.com/wpa/qunwpa?idkey=e5f4734d7044e0d6a1f043837a0862f408032c98145f6d8f0f050d898821dd87" target="_blank">Yii China VIP ②</a></li>-->
            <!--            <li><i class="fa fa-github fa-fw"></i> <a href="https://github.com/wodrow" target="_blank">wodrow</a></li>-->
        </ul>
    </div>
</div>
