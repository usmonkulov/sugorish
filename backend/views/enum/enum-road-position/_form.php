<?php

use settings\forms\enum\EnumRoadPositionForm;
use settings\status\enum\EnumRoadPositionStatus;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $form EnumRoadPositionForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>

    <?= $activeForm->errorSummary([$form]); ?>

    <?= $activeForm->field($form, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'title_oz')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'code_name')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'status')->dropDownList(EnumRoadPositionStatus::setLabel()); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Yuborish'), ['class' => 'btn btn-success']) ?>
        <!--        --><?//= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Yaratish') : Yii::t('app', 'Tahrirlash'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn ink-reaction btn-warning']) ?>
        <?= Html::a(Yii::t('yii', 'Orqaga'), ['road/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
