<?php

use settings\forms\auth\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginForm */

$this->title = Yii::t('app','Kirish');
$this->params['breadcrumbs'][] = $this->title;
$test = Yii::t("app",'Parolni tiklamoqchimisiz?');
?>
<!-- Logo -->
<div class="app-brand justify-content-center">
    <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-text demo text-body fw-bolder">Samyo'lko'kalam</span>
    </a>
</div>
<!-- /Logo -->

<?php $form = ActiveForm::begin(['id' => 'formAuthentication', 'class' => 'mb-3']); ?>

    <?= $form->field($model, 'username', [
            'options' =>  [
                'tag' => 'div',
                'class' => 'mb-3'
            ],
            'labelOptions' => [ 'class' => 'form-label' ]
    ])->textInput(
        [
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', "Loginni kiriting"),
            'autofocus' => true,
        ]
    ) ?>

    <?= $form->field($model, 'password', [
            'options' => [
                'tag' => 'div',
                'class' => 'mb-3 form-password-toggle'
            ],
            'labelOptions' => [ 'class' => 'form-label' ],
            'template' => '
                <div class="d-flex justify-content-between">
                    {label}
                    <a href="auth-forgot-password-basic.html">
                        <small>{$test}</small>
                    </a>
                </div>
                <div class="input-group input-group-merge">
                    {input}
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                    {error}{hint}
            '
        ]
    )->passwordInput(
        [
            'id' => 'password',
            'class' => 'form-control',
            'aria-describedby' => 'password',
            'placeholder' => '············',
        ]
    ) ?>

    <?= $form->field($model, 'rememberMe', [
            'options' => [
                'tag' => 'div',
                'class' => 'mb-3'
            ],
            'labelOptions' => [ 'class' => 'form-check-label' ],
            'template' => '<div class="form-check">{input} {label} {error} {hint}</div>'
        ]
    )->checkbox(
        [
            'id' => 'remember-me',
            'class' => 'form-check-input'
        ]
    ) ?>

    <?= Html::tag('div', Html::submitButton($this->title, ['class' => 'btn btn-primary d-grid w-100', 'name' => 'login-button']), ['class' => 'mb-3'])?>

<?php ActiveForm::end(); ?>
