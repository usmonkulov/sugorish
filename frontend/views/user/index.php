<?php

use backend\widgets\grid\RoleColumn;
use kartik\date\DatePicker;
use settings\entities\user\User;
use settings\helpers\UserHelper;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Foydalanuvchilar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('<i class="fa fa-user-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
        <?= Html::a('<i class="fa fa-rotate-right"></i>', ['/user'], ['class' => 'btn btn-info','title'=>Yii::t('app','Qayta yuklash')]) ?>
        <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'options' => ['class' => 'panel table-responsive'],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    [
                        'attribute' => 'created_at',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'date_from',
                            'attribute2' => 'date_to',
                            'type' => DatePicker::TYPE_RANGE,
                            'separator' => '-',
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ]),
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'username',
                        'value' => function (User $model) {
                            return Html::a(Html::encode($model->username), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'email:email',
                    [
                        'attribute' => 'role',
                        'class' => RoleColumn::class,
                        'filter' => $searchModel->rolesList(),
                    ],
                    [
                        'attribute' => 'status',
                        'filter' => UserHelper::statusList(),
                        'value' => function (User $model) {
                            return UserHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'class' => ActionColumn::class,
                        'buttons' => [
                            'view' => function($url,$model)
                            {
                                return Html::a(
                                    '<i class="ace-icon fa fa-user bigger-130"></i>',
                                    ['view','id' => $model->id],
                                    [
                                        'title'=>Yii::t('yii','View'),
                                        'class' => 'btn btn-info btn-xs'
                                    ]
                                );
                            },

                            'update' => function($url,$model)
                            {
                                return Html::a(
                                    '<i class="ace-icon fa fa-pencil bigger-130"></i>',
                                    $url,
                                    [
                                        'title'=>Yii::t('yii','Update'),
                                        'class' => 'btn btn-primary btn-xs'
                                    ]
                                );
                            },

                            'delete' => function($url,$model)
                            {
                                if (Yii::$app->user->id != $model->id)
                                return Html::a(
                                    '<i class="ace-icon fa fa-trash-o bigger-130"></i>',
                                    $url,
                                    [
                                        'title'=>Yii::t('yii','Delete'),
                                        'data' =>
                                            [
                                                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                'method'=>'post'
                                            ],
                                        'class' => 'btn btn-danger btn-xs'
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
