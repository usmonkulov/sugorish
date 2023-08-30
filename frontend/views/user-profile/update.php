<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model settings\entities\user\UserProfile */

$this->title = 'Update User Profile: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="user-profile-update">

    <!-- Content wrapper -->
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bosh sahifa /</span> Mening profilim</h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link <?= (Yii::$app->controller->id == 'user') ? '' : 'active' ?>" href="<?=?>"><i class="bx bxs-user-account me-1"></i> <?=Yii::t('app', "Mening profilim")?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (Yii::$app->controller->id == 'user-profile') ? '' : 'active' ?>" href="javascript:void(0);"><i class="bx bxs-user-account me-1"></i> <?=Yii::t('app', "Login parol")?></a>
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
