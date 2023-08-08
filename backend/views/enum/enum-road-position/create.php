<?php

use settings\forms\enum\EnumRoadPositionForm;
use yii\web\View;

/* @var $this View */
/* @var $form EnumRoadPositionForm */
/* @var $model null*/


$this->title = Yii::t('app','Lavozim yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Yo\'llar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model
    ]) ?>

</div>
