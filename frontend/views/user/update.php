<?php

/* @var $this yii\web\View */
/* @var $model settings\forms\manage\user\UserEditForm */
/* @var $user settings\entities\user\User */

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
                        <a class="nav-link <?= (Yii::$app->controller->id == 'user') ? '' : 'active' ?>" href="<?= Url::to(['user-profile/update', 'id' => $user->id])?>"><i class="bx bxs-user-account me-1"></i> <?=Yii::t('app', "Mening profilim")?></a>
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

                        <?= $form->field($model, 'username')->textInput(['maxLength' => true]) ?>
                        <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
                        <?= $form->field($model, 'phone')->textInput(['maxLength' => true]) ?>

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
