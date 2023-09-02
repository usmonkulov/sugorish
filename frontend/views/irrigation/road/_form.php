<?php

use kartik\widgets\DateTimePicker;
use settings\forms\irrigation\RoadIrrigationTaskForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form RoadIrrigationTaskForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <!-- START ALERTS AND CALLOUTS -->
    <?php if(Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-primary alert-dismissible" role="alert">
            <?php echo Yii::$app->session->getFlash('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <!-- END ALERTS AND CALLOUTS -->
    <?php $activeForm = ActiveForm::begin(); ?>

    <?= $activeForm->field($form, 'start_time', [
        'options' => [
            'tag' => 'div',
            'class' => 'mb-3'
        ],
        'labelOptions' => [ 'class' => 'form-label' ],
        'inputOptions' => ['value' => date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' -30 minutes')),],
    ])->widget(DateTimePicker::class, [
        'options' => ['placeholder' => Yii::t('app', "Boshlanish vaqtini kiriting")],
        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii',
            'startDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' -4 hour')),
            'endDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' +4 hour')),
        ],
        'removeIcon' => Html::tag('i', '', ['class' => 'bx bxs-calendar-x', 'style' => 'margin-left: -8px;']),
        'pickerIcon' =>  Html::tag('i', '', ['class' => 'bx bxs-calendar', 'style' => 'margin-left: -8px;']),
    ]);?>

    <?= $activeForm->field($form, 'end_time', [
        'options' => [
            'tag' => 'div',
            'class' => 'mb-3'
        ],
        'labelOptions' => [ 'class' => 'form-label' ],
        'inputOptions' => ['value' => date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . '30 minutes')),],
    ])->widget(DateTimePicker::class, [
        'options' => ['placeholder' => Yii::t('app', "Boshlanish vaqtini kiriting")],
        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii',
            'startDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' -4 hour')),
            'endDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' +4 hour')),
        ],
        'removeIcon' => Html::tag('i', '', ['class' => 'bx bxs-calendar-x', 'style' => 'margin-left: -8px;']),
        'pickerIcon' =>  Html::tag('i', '', ['class' => 'bx bxs-calendar', 'style' => 'margin-left: -8px;']),
    ]);?>

    <?= $activeForm->field($form, 'content', [
        'options' => [
            'tag' => 'div',
            'class' => 'mb-3'
        ],
        'labelOptions' => [ 'class' => 'form-label' ],
    ])->textarea(
        [
            'class' => 'form-control',
            'maxlength' => true,
            'rows' => '2'
        ]
    ) ?>

    <?= Html::submitButton(Yii::t('app', "Sug'orish"), ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
