<?php

use settings\forms\enum\EnumRoadTypeForm;
use settings\status\enum\EnumRoadTypeStatus;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $form EnumRoadTypeForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>
    <div class="box-body">
<!--    --><?//= $activeForm->errorSummary([$form]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $activeForm->field($form, 'title_uz')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'title_oz')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'title_ru')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $activeForm->field($form, 'code_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => EnumRoadTypeStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <?= Html::submitButton(!isset($model->isNewRecord) ? Yii::t('app', "Qo'shish") : Yii::t('app','Tahrirlash'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
