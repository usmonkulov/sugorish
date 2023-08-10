<?php

use settings\forms\enum\EnumRoadTypeForm;
use yii\web\View;

/* @var $this View */
/* @var $form EnumRoadTypeForm */
/* @var $model null*/


$this->title = Yii::t('app','Yo\'l turini yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Yo\'l turlari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model
    ]) ?>

</div>
