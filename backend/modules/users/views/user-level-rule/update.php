<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\UserLevelRule */

$this->title = 'Update User Level Rule: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Level Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-level-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
