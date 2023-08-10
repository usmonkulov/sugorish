<?php

use settings\forms\enum\EnumRoadEmployeesForm;
use yii\web\View;

/* @var $this View */
/* @var $form EnumRoadEmployeesForm */
/* @var $model null*/


$this->title = Yii::t('app','Hodim yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Hodimlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model
    ]) ?>

</div>
