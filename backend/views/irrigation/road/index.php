<?php

use kartik\select2\Select2;
use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadType;
use settings\forms\irrigation\search\RoadSearchForm;
use settings\repositories\enum\EnumRoadTypeRepository;
use settings\status\GeneralStatus;
use settings\status\irrigation\RoadStatus;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchForm RoadSearchForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', "Yo'llar");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
        <?= Html::a('<i class="fa fa-rotate-right"></i>', ['/road'], ['class' => 'btn btn-info','title'=>Yii::t('app','Qayta yuklash')]) ?>
        <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
    </p>
    <div class="box">
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
                'attribute' => 'title_uz',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->type->code_name . $data->code_name .' '. $data->title_oz .' '. $data->start_km . '-' . $data->end_km, ['enum-road-type/view/', 'id' => $data->id]);
                }
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
                'headerOptions' => ['width' => '11%'],
                'filterOptions' => ['width' => '11%'],
                'contentOptions' => ['width' => '11%'],
            ],
            [
                'attribute' => 'type_id',
                'format'    => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'type_id',
                        'data' =>  ArrayHelper::map(EnumRoadTypeRepository::findCodeTitleAllForSelect(),'id','title'),
                        'options' => [
                            'id' => 'type_id',
                            'prompt' => Yii::t('app', '...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                ),
                'value'     => function ($data) {
                    if ($data->type_id) {
                        return $data->type->code_name . '(' . $data->type->title_oz .')';
                    }
                    return null;
                },
                'headerOptions' => ['width' => '11%'],
                'filterOptions' => ['width' => '11%'],
                'contentOptions' => ['width' => '11%'],
            ],
            [
                'attribute' => 'enterprise_expert_id',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->enterpriseExpert) {
                        return $data->enterpriseExpert->first_name . ' ' . $data->enterpriseExpert->last_name;
                    }
                    return null;
                },
                'headerOptions' => ['width' => '11%'],
                'filterOptions' => ['width' => '11%'],
                'contentOptions' => ['width' => '11%'],
            ],
            [
                'attribute' => 'plot_chief_id',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->plotChief) {
                        return $data->plotChief->first_name . ' ' . $data->plotChief->last_name;
                    }
                    return null;
                },
                'headerOptions' => ['width' => '11%'],
                'filterOptions' => ['width' => '11%'],
                'contentOptions' => ['width' => '11%'],
            ],
            [
                'attribute' => 'water_employee_id',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->waterEmployee) {
                        return $data->waterEmployee->first_name . ' ' . $data->waterEmployee->last_name;
                    }
                    return null;
                },
                'headerOptions' => ['width' => '11%'],
                'filterOptions' => ['width' => '11%'],
                'contentOptions' => ['width' => '11%'],
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'status',
                        'data' =>  ArrayHelper::map(RoadStatus::getStatusForSelect(), 'id', 'value'),
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
                        return RoadStatus::getStatusHtml($data, 'index');
                    }
                },
                'headerOptions' => ['width' => '7%'],
                'filterOptions' => ['width' => '7%'],
                'contentOptions' => ['width' => '7%'],
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
