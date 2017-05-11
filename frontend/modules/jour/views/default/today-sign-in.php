<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-11
 * Time: 上午9:41
 */
$this->title = "今日签到";
$this->params['breadcrumbs'][] = $this->title;

$users = \common\models\User::find()->joinWith('userInfo as ui')->orderBy(['ui.level'=>SORT_DESC])->limit(42)->all();
$users = \common\components\tools\Tools::arrayCopy($users, 10);
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-header">
            <h1>今日签到会员</h1>
            <span class="pull-right stat">
                昨日签到：<strong>233</strong>
                上周同期：<strong>217</strong>
                今日签到：<strong>208</strong>
            </span>
        </div>
        <ul class="media-list registration">
            <li class="media col-lg-4 col-md-4" style="float: left; margin-bottom: 15px; font-size: 12px; margin-top: 0;">
                <div class="media-left">
                    <a href="/user/270" rel="author"><img class="media-object" src="/site/avatar?text=%E7%A5%9E%E6%98%8E&rule=%7B+%22background%22%3A%7B+%22r%22%3A131%2C+%22g%22%3A175%2C+%22b%22%3A155+%7D+%2C+%22color%22%3A%7B+%22r%22%3A0%2C+%22g%22%3A0%2C+%22b%22%3A0+%7D%7D" alt="lilongsy"></a>                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <a href="/user/270" rel="author">lilongsy</a>                        <em>NO. <i>1</i></em>
                    </div>
                    <div class="media-content">
                        签到时间：<i>00:00:16</i><br>
                        连续签到：<i>320</i>天
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">连续签到排名</h2>
            </div>
            <div class="panel-body">
                <ul class="media-list registration">
                    <li class="media">
                        <div class="media-left">
                            <a href="/user/25794" rel="author"><img class="media-object" src="/site/avatar?text=%E7%A5%9E%E6%98%8E&rule=%7B+%22background%22%3A%7B+%22r%22%3A131%2C+%22g%22%3A175%2C+%22b%22%3A155+%7D+%2C+%22color%22%3A%7B+%22r%22%3A0%2C+%22g%22%3A0%2C+%22b%22%3A0+%7D%7D" alt="胖纸囧"></a>                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <a href="/user/25794" rel="author">胖纸囧</a>                                <em>NO. <i>1</i></em>
                            </div>
                            <div class="media-content">
                                连续签到：<i>945</i>天
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
