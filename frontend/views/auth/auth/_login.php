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
?>

<!-- Logo -->
<div class="app-brand justify-content-center">
    <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-text demo text-body fw-bolder">Samyo'lko'kalam</span>
    </a>
</div>
<!-- /Logo -->
<h4 class="mb-2">Sug'orish grafigi</h4>

<form id="formAuthentication" class="mb-3" action="index.html" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email or Username</label>
        <input
            type="text"
            class="form-control"
            id="email"
            name="email-username"
            placeholder="Enter your email or username"
            autofocus
        />
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            <a href="auth-forgot-password-basic.html">
                <small>Forgot Password?</small>
            </a>
        </div>
        <div class="input-group input-group-merge">
            <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
            />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" />
            <label class="form-check-label" for="remember-me"> Remember Me </label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
    </div>
</form>

<p class="text-center">
    <span>New on our platform?</span>
    <a href="auth-register-basic.html">
        <span>Create an account</span>
    </a>
</p>

<!--<div class="row">-->
<!--    <div class="col-sm-6">-->
<!--        <div class="well">-->
<!--            --><?//= Html::tag('h1', $this->title);?>
<!---->
<!--            --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!---->
<!--            --><?//= $form->field($model, 'username')->textInput() ?>
<!---->
<!--            --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--            <div class="row">-->
<!--                <div class="col-md-6">-->
<!--                    --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
<!--                </div>-->
<!--                <div class="col-md-6">-->
<!--                    <div style="color:#999;margin-left: 75px">-->
<!--                        --><?//= Html::a(Yii::t('app','Parolni tiklash'), ['auth/reset/request']) ?><!--.-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div>-->
<!--                --><?//= Html::submitButton($this->title, ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--            </div>-->
<!---->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
