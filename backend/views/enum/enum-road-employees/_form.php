<?php

use kartik\depdrop\DepDrop;
use kartik\widgets\Select2;
use settings\entities\enums\EnumRegions;
use settings\forms\enum\EnumRoadEmployeesForm;
use settings\helpers\CommonHelper;
use settings\helpers\EmployeesPositionHelper;
use settings\helpers\GenderHelper;
use settings\repositories\enum\EnumRoadEmployeesRepository;
use settings\repositories\enum\EnumRoadPositionRepository;
use settings\status\enum\EnumRoadEmployeesStatus;
use settings\status\enum\EnumRoadPositionStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this View */
/* @var $form EnumRoadEmployeesForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>
    <div class="box-body">
<!--        --><?//= $activeForm->errorSummary([$form]); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $activeForm->field($form, 'first_name')->textInput(['maxlength' => true]) ?>
                <?= $activeForm->field($form, 'last_name')->textInput(['maxlength' => true]) ?>
                <?= $activeForm->field($form, 'middle_name')->textInput(['maxlength' => true]) ?>
                <?= $activeForm->field($form, 'birthday')->widget(MaskedInput::class, [
                    'clientOptions' => [
                        'alias' => 'yyyy-mm-dd',
                    ]
                ]) ?>
                <?= $activeForm->field($form, 'gender')->radioList(ArrayHelper::map(GenderHelper::getGenderForSelect(), 'id', 'value')) ?>
            </div>
            <div class="col-md-4">
                <?= $activeForm->field($form, 'region_id')->widget(Select2::class, [
                    'data' => CommonHelper::getList(EnumRegions::find()->where(['parent_id' => null])->orderBy('order')->all()),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Viloyatni tanlang") . ' --', 'value' => 1718, 'disabled' => 'disabled'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>

                <?= $activeForm->field($form, 'district_id')->widget(DepDrop::class, [
                    'data' => ArrayHelper::map(EnumRegions::findAll(['parent_id' => 1718]),'id','title_oz'),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Tuman yoki shaharni tanlang") . ' --'],
                    'pluginOptions' => [
                        'depends' => [Html::getInputId($form, 'region_id')],
                        'placeholder' => Yii::t('app',"Tuman yoki shaharni tanlang"),
                        'url' => Url::to(['/api/districts'])
                    ]
                ]) ?>
                <?= $activeForm->field($form, 'address')->textarea(['rows' => 6]) ?>

            </div>
            <div class="col-md-4">
                <?= $activeForm->field($form, 'phone')->widget(MaskedInput::class, [
                    'mask' => '(99) 999-99-99',
                ]) ?>

                <?= $activeForm->field($form, 'email')->widget(MaskedInput::class, [
                    'clientOptions' => [
                        'alias' =>  'email'
                    ],
                ]) ?>
                <?= $activeForm->field($form, 'position_id')->widget(Select2::class, [
                    'data'          => ArrayHelper::map(EnumRoadPositionRepository::findAllForSelect(), 'id', 'title_oz'),
                    'options'       => [
                        'placeholder' =>'-- ' . Yii::t('app','Lavozimni tanlang') . ' --',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]) ?>

                <?= $activeForm->field($form, 'code_position')->radioList(ArrayHelper::map(EmployeesPositionHelper::getPositionForSelect(), 'id', 'value')) ?>

                <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => EnumRoadEmployeesStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>
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
