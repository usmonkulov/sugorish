<?php

use kartik\depdrop\DepDrop;
use kartik\widgets\Select2;
use settings\entities\enums\EnumRegions;
use settings\forms\enum\EnumRoadEmployeesForm;
use settings\helpers\CommonHelper;
use settings\helpers\GenderHelper;
use settings\repositories\enum\EnumRoadEmployeesRepository;
use settings\repositories\enum\EnumRoadPositionRepository;
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

    <?= $activeForm->errorSummary([$form]); ?>

    <?= $activeForm->field($form, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $activeForm->field($form, 'birthday')->widget(MaskedInput::class, [
        'clientOptions' => [
            'alias' => 'yyyy-mm-dd',
        ]
    ]) ?>

    <?= $activeForm->field($form, 'phone')->widget(MaskedInput::class, [
        'mask' => '(99) 999-99-99',
    ]) ?>

    <?= $activeForm->field($form, 'email')->widget(MaskedInput::class, [
        'clientOptions' => [
            'alias' =>  'email'
        ],
    ]) ?>

    <?= $activeForm->field($form, 'gender')->radioList(ArrayHelper::map(GenderHelper::getGenderForSelect(), 'id', 'value'))
    ?>

    <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => EnumRoadPositionStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>

    <?= $activeForm->field($form, 'position_id')->widget(Select2::class, [
        'data'          => ArrayHelper::map(EnumRoadPositionRepository::findAllForSelect(), 'id', 'title_uz'),
        'options'       => [
            'placeholder' =>'-- ' . Yii::t('app','Lavozimni tanlang') . ' --',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <?= $activeForm->field($form, 'region_id')->widget(Select2::class, [
        'data' => CommonHelper::getList(EnumRegions::find()->where(['parent_id' => null])->orderBy('order')->all()),
        'options' => ['placeholder' => '-- ' . Yii::t('app',"Viloyatni tanlang") . ' --'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $activeForm->field($form, 'district_id')->widget(DepDrop::class, [
        'data' => !empty($form->region_id) ? CommonHelper::getList(EnumRegions::find()->where(['parent_id' => $form->region_id])->orderBy('title_' . Yii::$app->language)->all()) : [],
        'options' => ['placeholder' => '-- ' . Yii::t('app',"Tuman yoki shaharni tanlang") . ' --'],
        'pluginOptions' => [
            'depends' => [Html::getInputId($form, 'region_id')],
            'placeholder' => Yii::t('app',"Tuman yoki shaharni tanlang"),
            'url' => Url::to(['/api/districts'])
        ]
    ]) ?>

    <?= $activeForm->field($form, 'address')->textarea(['rows' => 3]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Yuborish'), ['class' => 'btn btn-success']) ?>
        <!--        --><?//= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Yaratish') : Yii::t('app', 'Tahrirlash'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn ink-reaction btn-warning']) ?>
        <?= Html::a(Yii::t('yii', 'Orqaga'), ['road/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
