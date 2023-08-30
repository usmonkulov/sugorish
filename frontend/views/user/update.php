<?php

/* @var $this yii\web\View */
/* @var $model settings\forms\manage\user\UserEditForm */
/* @var $user settings\entities\user\User */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Update User: ' . $user->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->id, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <!-- Content wrapper -->
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bosh sahifa /</span> Mening profilim</h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link <?= (Yii::$app->controller->id == 'user') ? '' : 'active' ?>" href="javascript:void(0);"><i class="bx bxs-user-account me-1"></i> <?=Yii::t('app', "Mening profilim")?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (Yii::$app->controller->id == 'user-profile') ? '' : 'active' ?>" href="javascript:void(0);"><i class="bx bxs-user-account me-1"></i> <?=Yii::t('app', "Login parol")?></a>
<!--                    --><?//= Html::a(Html::tag('i', '', ['class' => 'bx bx-user me-1']) . Yii::t('app', "Login parol"), ['user/update', 'id' => $user->id], ['class' => 'nav-link']) ?>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Profil ma'lumotlari</h5>
                    <div class="card-body">
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'username')->textInput(['maxLength' => true]) ?>
                        <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
                        <?= $form->field($model, 'phone')->textInput(['maxLength' => true]) ?>
                        <?= $form->field($model, 'role')->dropDownList($model->rolesList()) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>
    <!-- Content wrapper -->

</div>
</div>
