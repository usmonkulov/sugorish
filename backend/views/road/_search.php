<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model settings\forms\search\RoadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="road-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'road_name') ?>

    <?= $form->field($model, 'code_name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'coordination') ?>

    <?php // echo $form->field($model, 'enterprise_expert') ?>

    <?php // echo $form->field($model, 'plot_chief') ?>

    <?php // echo $form->field($model, 'water_employee') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'image_url') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
