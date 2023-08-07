<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model settings\entities\irrigation\Road */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->road_name
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nomzodlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->road_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="road-update">

    <?= $this->render('_form', [
        'model' => $model,
        'form' => $form,
    ]) ?>

</div>
