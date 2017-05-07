<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\UserLevelRule */

$this->title = 'Create User Level Rule';
$this->params['breadcrumbs'][] = ['label' => 'User Level Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-level-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
