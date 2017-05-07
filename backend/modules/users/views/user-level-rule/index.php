<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\users\models\UserLevelRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Level Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-level-rule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Level Rule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'begin',
            'end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
