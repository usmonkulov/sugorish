<?php

use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\TimePicker;
use mihaildev\ckeditor\CKEditor;
use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadEmployees;
use settings\entities\enums\EnumRoadType;
use settings\forms\irrigation\RoadForm;
use settings\helpers\CommonHelper;
use settings\repositories\enum\EnumRoadEmployeesRepository;
use settings\repositories\enum\EnumRoadTypeRepository;
use settings\status\GeneralStatus;
use settings\status\irrigation\RoadStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form RoadForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
            <?= $activeForm->field($form, 'title_uz')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'title_oz')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'type_id')->widget(Select2::class, [
                'data' => ArrayHelper::map(EnumRoadTypeRepository::findCodeTitleAllForSelect(),'id','title'),
                'options' => ['placeholder' => '-- ' . Yii::t('app',"Yo'l toifasini tanlang") . ' --'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
            <?= $activeForm->field($form, 'code_name')->textInput(['maxlength' => true]) ?>
           <div class="row">
               <div class="col-md-6">
                   <?= $activeForm->field($form, 'start_km')->widget(TimePicker::class, [
                   'pluginOptions' => [
                       'showSeconds' => false,
                       'showMeridian' => false,
                       'minuteStep' => 1,
                       'secondStep' => 5,
                   ]]);?>

                   <?= $activeForm->field($form, 'start_km')->textInput(['maxlength' => true, 'type'=>'number', 'min' => 0]) ?>
               </div>
               <div class="col-md-6">
                   <?= $activeForm->field($form, 'end_km')->textInput(['maxlength' => true, 'type'=>'number', 'min' => 0]) ?>
               </div>
           </div>
            </div>

            <div class="col-md-4">
                <?= $activeForm->field($form, 'field_number')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'coordination')->textInput(['maxlength' => true]) ?>

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
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);?>

            </div>

            <div class="col-md-4">
                <?= $activeForm->field($form, 'enterprise_expert_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(EnumRoadEmployeesRepository::findEnterpriseExpertAllForSelect(),'id','title'),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Korxonadan biriktirilgan hodimni tanlang") . ' --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>

                <?= $activeForm->field($form, 'plot_chief_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(EnumRoadEmployeesRepository::findPlotChiefAllForSelect(),'id','title'),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Uchastka boshlig'ini tanlang") . ' --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>

                <?= $activeForm->field($form, 'water_employee_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(EnumRoadEmployeesRepository::findWorkerAllForSelect(),'id','title'),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Yo'lga biriktirilgan suvchini tanlang") . ' --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>
                <?= $activeForm->field($form, 'image_url')->widget(CKEditor::class,[
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);?>

                <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => RoadStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>
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
