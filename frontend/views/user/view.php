<?php

use settings\helpers\GenderHelper;
use settings\helpers\UserHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model settings\entities\user\User */
/* @var $tab */

$this->title = $model->getAttributeLabel('username') .": ". $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Foydalanuvchilar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-view">
    <div class="card">
        <h5 class="card-header"><?=$this->title?></h5>
        <div class="card-body">
            <div class="demo-inline-spacing">
                <?= Html::a(
                    '<i class="bx bxs-pencil"></i>',
                    ['update', 'id' => $model->id],
                    ['title' => Yii::t('yii','Tahrirlash'),'class' => 'btn btn-primary'])
                ?>

                <?= Html::a(
                    '<i class="bx bx-home-circle"></i>',
                    ['/'],
                    ['class' => 'btn btn-default', 'title' => Yii::t('yii','Bosh sahifa')])
                ?>

                <?= Html::a(
                    '<i class="bx bx-rotate-right"></i>',
                    ['view', 'id' => $model->id],
                    ['title' => Yii::t('yii','Qayta yuklash'), 'class' => 'btn btn-info'])
                ?>

                <?php
                if (empty($model->userProfile->user_id)) {
                    echo Html::a('<i class="bx bxs-user"></i>', ['user-profile/create', 'id' => $model->id],
                        ['title' => Yii::t('yii',"Profil ma'lumoti"), 'class' => 'btn btn-success']);
                } else {
                    echo Html::a('<i class="bx bxs-user"></i>', ['user-profile/update', 'id' => $model->id],
                        ['title' => Yii::t('yii',"Profil ma'lumoti"), 'class' => 'btn btn-info']);
                }
                ?>
            </div>
            <br>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'email:email',
                    'phone',
                    [
                        'label' => 'Role',
                        'value' => implode(', ', ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser($model->id), 'description')),
                        'format' => 'raw',
                    ],
                    'userProfile.first_name:html',
                    'userProfile.last_name:html',
                    'userProfile.middle_name:html',
                    'userProfile.birthday:html',
                    [
                        'attribute' => 'userProfile.gender',
                        'format' => 'html',
                        'value'     => function ($data) {
                            if ($data->userProfile)
                                return GenderHelper::getGenderHtml($data->userProfile);
                        },
                    ],
                    [
                        'label' => Yii::t('app',"Viloyat"),
                        'attribute' => 'userProfile.region.title_oz',
                        'format' => 'html',
                    ],
                    [
                        'label' => Yii::t('app',"Tuman yoki Shahar"),
                        'attribute' => 'userProfile.district.title_oz',
                        'format' => 'html',
                    ],
                    'userProfile.address:html',
                ],
            ]) ?>
        </div>
    </div>

</div>
