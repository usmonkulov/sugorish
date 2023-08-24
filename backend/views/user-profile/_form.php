<?php

use kartik\depdrop\DepDrop;
use kartik\widgets\Select2;
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
        <div class="row">
            <?php $activeForm = ActiveForm::begin(); ?>
            <div class="col-md-4">

                <?= $activeForm->field($form, 'first_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'last_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'middle_name')->textInput(['maxlength' => true]) ?>

                <?= $activeForm->field($form, 'birthday')->textInput() ?>

                <?= $activeForm->field($form, 'gender')->radioList(ArrayHelper::map(GenderHelper::getGenderForSelect(), 'id', 'value')) ?>

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

                <?= $activeForm->field($form, 'address')->textarea(['rows' => 3]) ?>

                <?= $activeForm->field($form, 'avatar')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
