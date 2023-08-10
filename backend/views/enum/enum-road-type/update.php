<?php

use settings\entities\enums\EnumRoadType;

/* @var $this yii\web\View */
/* @var $model EnumRoadType */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->title_uz
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lavozimlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_uz, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="road-update">

    <?= $this->render('_form', [
        'model' => $model,
        'form' => $form,
    ]) ?>

</div>
