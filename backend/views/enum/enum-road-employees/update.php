<?php

use settings\entities\enums\EnumRoadEmployees;
use yii\web\View;

/* @var $this View */
/* @var $model EnumRoadEmployees */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->first_name
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hodimlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="road-update">

    <?= $this->render('_form', [
        'model' => $model,
        'form' => $form,
    ]) ?>

</div>
