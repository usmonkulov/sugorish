<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model settings\entities\road\Road */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="road-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'road_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'coordination')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enterprise_expert')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'plot_chief')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'water_employee')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'image_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
