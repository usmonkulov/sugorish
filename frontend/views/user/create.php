<?php

/* @var $this yii\web\View */
/* @var $model settings\forms\manage\user\UserCreateForm */

use kartik\password\PasswordInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Yangi foydalanuvchi yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Foydalanuvchilar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php $form = ActiveForm::begin(['id' => 'form-user']); ?>
    <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="well">
            <?= $form->field($model, 'username')->textInput(['maxLength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
            <?= $form->field($model, 'phone')->textInput(['maxLength' => true]) ?>
            <?= $form->field($model, 'password')->widget(PasswordInput::class,
                ['options' => ['placeholder' => Yii::t('app', 'Yangi parol')]])->label(Yii::t('app', 'Parol')) ?>
            <?= $form->field($model, 'role')->dropDownList($model->rolesList()) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('yii', 'Orqaga'), ['user/index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
