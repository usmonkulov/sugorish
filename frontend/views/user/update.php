<?php

/* @var $this yii\web\View */
/* @var $model settings\forms\manage\user\UserEditForm */
/* @var $user settings\entities\user\User */

use kartik\password\PasswordInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', "Login parolni tahrirlash");
?>
<div class="user-update">
    <!-- Content wrapper -->
    <h4 class="fw-bold py-3 mb-4"> <?= $this->title?></h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link <?= (Yii::$app->controller->id == 'user') ? '' : 'active' ?>" href="<?= Url::to([empty($user->userProfile->user_id) ? 'user-profile/create' : 'user-profile/update', 'id' => $user->id])?>"><i class="bx bxs-user-account me-1"></i> <?=Yii::t('app', "Mening profilim")?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (Yii::$app->controller->id == 'user-profile') ? '' : 'active' ?>" href="<?= Url::to(['user/update', 'id' => $user->id])?>"><i class="bx bxs-user me-1"></i> <?=$this->title?></a>
                    </li>
                </ul>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Login parol ma'lumotlari</h5>
                    <div class="card-body">
                        <!-- START ALERTS AND CALLOUTS -->
                        <?php if(Yii::$app->session->hasFlash('success') ): ?>
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                <?php echo Yii::$app->session->getFlash('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>
                        <!-- END ALERTS AND CALLOUTS -->
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="mb-3 col-md-6">

                                <?= $form->field($model, 'username', [
                                    'labelOptions' => [ 'class' => 'form-label' ]
                                ])->textInput([
                                    'autofocus' => 'autofocus',
                                    'class' => 'form-control'
                                ]) ?>

                                <?= $form->field($model, 'password', [
                                    'labelOptions' => [ 'class' => 'form-label' ]
                                ])->widget(PasswordInput::class, [
                                        'options' => ['placeholder' => Yii::t('app', "Parolni yangilash")],
                                         'pluginOptions' => [
                                             'showMeter' => true,
                                             'toggleClass' =>  'kv-toggle',
                                             'toggleTitle' => Yii::t('app', "Parolni ko'rsatish/yashirish"),
                                             'verdictTitles' => [
                                                 0 => Yii::t('app', "Kiritilmadi"),
                                                 1 => Yii::t('app', "Juda zaif"),
                                                 2 => Yii::t('app', "Zaif"),
                                                 3 => Yii::t('app', "Yaxshi"),
                                                 4 => Yii::t('app', "Kuchli"),
                                                 5 => Yii::t('app', "Juda kuchli")
                                             ],
                                             'verdictClasses' => [
                                                 0 => 'label label-default badge-secondary',
                                                 1 => 'label label-danger badge-dange',
                                                 2 => 'label label-warning badge-warning',
                                                 3 => 'label label-info badge-info',
                                                 4 => 'label label-primary badge-primary',
                                                 5 => 'label label-success badge-success'
                                             ],
                                         ],
                                ])->label(Yii::t('app', 'Parol')) ?>
                            </div>
                            <div class="mb-3 col-md-6">

                                <?= $form->field($model, 'email', [
                                    'labelOptions' => [ 'class' => 'form-label' ]
                                ])->textInput([
                                    'autofocus' => 'autofocus',
                                    'class' => 'form-control'
                                ]) ?>

                                <?= $form->field($model, 'phone', [
                                    'labelOptions' => [ 'class' => 'form-label' ]
                                ])->textInput([
                                    'autofocus' => 'autofocus',
                                    'class' => 'form-control'
                                ]) ?>

                            </div>
                            </div>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', "Tahrirlash"), ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>
    <!-- Content wrapper -->

</div>
</div>
