<?php

use kartik\select2\Select2;
use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadPosition;
use settings\forms\enum\EnumRoadEmployeesForm;
use settings\helpers\EmployeesPositionHelper;
use settings\status\enum\EnumRoadEmployeesStatus;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchForm EnumRoadEmployeesForm */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'Hodimlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
        <?= Html::a('<i class="fa fa-rotate-right"></i>', ['index'], ['class' => 'btn btn-info','title'=>Yii::t('app','Qayta yuklash')]) ?>
        <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
    </p>
    <div class="box box-info">
        <div class="box-body">
        <?= GridView::widget([
        'options' => ['class' => 'panel table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchForm,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '5%'],
                'filterOptions' => ['width' => '5%'],
                'contentOptions' => ['width' => '5%'],
            ],

            [
                'attribute' => 'first_name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->first_name, ['enum/enum-road-employees/view', 'id' => $data->id]);
                },
                'headerOptions' => ['width' => '15%'],
                'filterOptions' => ['width' => '15%'],
                'contentOptions' => ['width' => '15%'],
            ],

            [
                'attribute' => 'last_name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->last_name, ['enum/enum-road-employees/view', 'id' => $data->id]);
                },
                'headerOptions' => ['width' => '15%'],
                'filterOptions' => ['width' => '15%'],
                'contentOptions' => ['width' => '15%'],
            ],
            [
                'attribute' => 'phone',
                'headerOptions' => ['width' => '10%'],
                'filterOptions' => ['width' => '10%'],
                'contentOptions' => ['width' => '10%'],
            ],
            [
                'attribute' => 'district_id',
                'format' => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'district_id',
                        'data' =>  ArrayHelper::map(EnumRegions::findAll(['parent_id' => 1718]),'id','title_oz'),
                        'options' => [
                            'id' => 'district_id',
                            'prompt' => Yii::t('app', '...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                ),
                'value'     => function ($data) {
                    if ($data->district_id) {
                        return $data->district->title_oz;
                    }
                    return null;
                },
            ],

            [
                'attribute' => 'position_id',
                'format' => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'position_id',
                        'data' =>  ArrayHelper::map(EnumRoadPosition::find()->all(),'id','title_oz'),
                        'options' => [
                            'id' => 'position_id',
                            'prompt' => Yii::t('app', '...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                ),
                'value'     => function ($data) {
                    if ($data->district_id) {
                        return $data->position->title_oz;
                    }
                    return null;
                },
            ],

            [
                'attribute' => 'code_position',
                'format' => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'code_position',
                        'data' =>  ArrayHelper::map(EmployeesPositionHelper::getPositionForSelect(), 'id', 'value'),
                        'options' => [
                            'id' => 'code_position',
                            'prompt' => Yii::t('app', '...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                ),
                'value'     => function ($data) {
                    if ($data->id)
                    return EmployeesPositionHelper::getLabel($data->code_position);
                },
            ],

            [
                'attribute' => 'status',
                'format' => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'status',
                        'data' =>  ArrayHelper::map(EnumRoadEmployeesStatus::getStatusForSelect(), 'id', 'value'),
                        'options' => [
                            'id' => 'status',
                            'prompt' => Yii::t('app', '...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                ),
                'value'     => function ($data) {
                    if ($data->id) {
                        return EnumRoadEmployeesStatus::getStatusHtml($data, 'index');
                    }
                },
            ],
            [
                'class' => ActionColumn::class,
                'buttons' => [
                    'view' => function($url,$model)
                    {
                        return Html::a(
                            '<i class="ace-icon fa fa-eye bigger-130"></i>',
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
