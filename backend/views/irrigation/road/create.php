<?php

use settings\forms\irrigation\RoadForm;
use yii\web\View;

/* @var $this View */
/* @var $form RoadForm */
/* @var $model null*/


$this->title = Yii::t('app','Yo\'l yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Yo\'llar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model
    ]) ?>

</div>
