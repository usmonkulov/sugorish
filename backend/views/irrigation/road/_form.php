<?php

use settings\forms\irrigation\RoadForm;
use settings\status\irrigation\RoadStatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form RoadForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>

    <?= $activeForm->errorSummary([$form]); ?>

    <?= $activeForm->field($form, 'road_name')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'code_name')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'address')->textarea(['rows' => 3]) ?>

    <?= $activeForm->field($form, 'coordination')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'enterprise_expert')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'plot_chief')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'water_employee')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $activeForm->field($form, 'status')->radioList(isset($model->isNewRecord) ? ['value' => RoadStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>
    <?= $activeForm->field($form, 'status')->dropDownList(RoadStatus::setLabel()); ?>

    <?= $activeForm->field($form, 'image_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Yuborish'), ['class' => 'btn btn-success']) ?>
        <!--        --><?//= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Yaratish') : Yii::t('app', 'Tahrirlash'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn ink-reaction btn-warning']) ?>
        <?= Html::a(Yii::t('yii', 'Orqaga'), ['road/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
