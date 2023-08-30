<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model settings\entities\user\UserProfile */

$this->title = Yii::t('app', "Mening profilim");
?>
<div class="user-profile-update">

    <!-- Content wrapper -->
    <h4 class="fw-bold py-3 mb-4"> <?= $this->title?></h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link <?= (Yii::$app->controller->id == 'user') ? '' : 'active' ?>" href="<?= Url::to(['user-profile/update', 'id' => $model->user_id])?>"><i class="bx bxs-user-account me-1"></i> <?= $this->title?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (Yii::$app->controller->id == 'user-profile') ? '' : 'active' ?>" href="<?= Url::to(['user/update', 'id' => $model->user_id])?>"><i class="bx bxs-user me-1"></i> <?=Yii::t('app', "Login parolni o'zgartirish")?></a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Profil ma'lumotlari</h5>
                <!-- Account -->
                    <?= $this->render('_form', [
                        'form' => $form,
                        'model' => $model
                    ]) ?>
                <!-- /Account -->
            </div>
        </div>
    </div>
    <!-- Content wrapper -->

</div>
