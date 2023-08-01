<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model settings\entities\road\Road */

$this->title = 'Update Road: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="road-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
