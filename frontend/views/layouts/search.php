<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var settings\entities\irrigation\Road $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="road-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_uz') ?>

    <?= $form->field($model, 'title_oz') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'start_km') ?>

    <?php // echo $form->field($model, 'end_km') ?>

    <?php // echo $form->field($model, 'code_name') ?>

    <?php // echo $form->field($model, 'field_number') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'coordination') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'enterprise_expert_id') ?>

    <?php // echo $form->field($model, 'plot_chief_id') ?>

    <?php // echo $form->field($model, 'water_employee_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'image_url') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!--<i class="bx bx-search fs-4 lh-0"></i>-->
<!--<input-->
<!--    type="text"-->
<!--    class="form-control border-0 shadow-none"-->
<!--    placeholder="Qidirish..."-->
<!--    aria-label="Search..."-->
<!--/>-->