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
    <?= Html::a(
        '<i class="fa fa-pencil"></i>',
        ['update', 'id' => $model->id],
        ['title' => Yii::t('yii','Login parolni tahrirlash'),'class' => 'btn btn-primary'])
    ?>

    <?= Html::a(
        '<i class="fa fa-home"></i>',
        ['/'],
        ['class' => 'btn btn-default', 'title' => Yii::t('yii','Home')])
    ?>

    <?= Html::a(
        '<i class="fa fa-rotate-right"></i>',
        ['view', 'id' => $model->id],
        ['title' => Yii::t('yii','Qayta yuklash'), 'class' => 'btn btn-info'])
    ?>

    <?= Html::a(
        '<i class="fa fa-share-square-o"></i>',
        ['index'], ['title' => Yii::t('yii', 'Orqaga'), 'class' => 'btn btn-success'])
    ?>

    <?php
    if (Yii::$app->user->id != $model->id)
        echo Html::a(
            '<i class="fa fa-trash-o"></i> ',
            ['delete', 'id' => $model->id],
            [
                'title' => Yii::t('yii', 'O\'chirish'),
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Siz rostdan ham ushbu elementni o\'chirmoqchimisiz?'),
                    'method' => 'post',
                ],
            ]
        )
    ?>
    <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Foydalanuvchi yaratish')]) ?>

    <?php
        if (empty($model->userProfile->user_id)) {
            echo Html::a('<i class="fa fa-user-md"></i>', ['user-profile/create', 'id' => $model->id],
                ['title' => Yii::t('yii',"Profil ma'lumotini yaratish"), 'class' => 'btn btn-info']);
        } else {
            echo Html::a('<i class="fa fa-user-md"></i>', ['user-profile/update', 'id' => $model->id],
                ['title' => Yii::t('yii',"Profil ma'lumotini tahrirlash"), 'class' => 'btn btn-info']);
        }
    ?>

    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'email:email',
                    'phone',
                    [
                        'attribute' => 'status',
                        'value' => UserHelper::statusLabel($model->status),
                        'format' => 'raw',
                    ],
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
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>
        </div>
    </div>
</div>
