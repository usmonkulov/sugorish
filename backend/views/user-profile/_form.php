<?php

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\widgets\Select2;
use mihaildev\ckeditor\CKEditor;
use settings\entities\enums\EnumRegions;
use settings\helpers\CommonHelper;
use settings\helpers\GenderHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form settings\forms\user\UserProfileForm */
/* @var $activeForm yii\widgets\ActiveForm */
?>

<div class="user-profile-form">
    <div class="box-body">
        <?php $activeForm = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $activeForm->field($form, 'first_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'last_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'middle_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'birthday')->widget(DatePicker::class, [
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'options' => [
                        'placeholder' => Yii::t('app',"Tug'ilgan kunni tanlang"),
                    ],
                    'pluginOptions' => [
                        'calendarWeeks' => true,
                        'daysOfWeekDisabled' => [0, 6],
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy',
                        'startDate' =>  date('d-m-Y', strtotime( date('d-m-Y') . ' -70 year')),
                        'endDate' =>  date('d-m-Y', strtotime( date('d-m-Y') . ' -20 year')),
                    ],
                    'removeIcon' => Html::tag('i', '', ['class' => 'fa fa-calendar-times-o']),
                    'removeButton' => ['title' => Yii::t('app', "Tozalash")],
                    'pickerIcon' =>  Html::tag('i', '', ['class' => 'fa fa-calendar']),
                    'pickerButton' => ['title' => Yii::t('app', "Tug'ulgan kunni tanlang")],
                ]);?>
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

                <?= $activeForm->field($form, 'address')->widget(CKEditor::class,[
                    'editorOptions' => [
                        'preset' => 'basic',
                        'inline' => false,
                    ],
                ]);?>
            </div>
            <div class="col-md-4">
                <?= $activeForm->field($form, 'avatar')->fileInput() ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton(!isset($model->isNewRecord) ? Yii::t('app', "Qo'shish") : Yii::t('app','Tahrirlash'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
