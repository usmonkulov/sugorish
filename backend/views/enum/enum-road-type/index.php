<?php

use settings\status\enum\EnumRoadTypeStatus;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchForm settings\forms\enum\search\EnumRoadTypeSearchForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', "Yo'l turlari");
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
            'id',
            [
                'attribute' => 'title_uz',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->title_uz, ['enum-road-type/view/', 'id' => $data->id]);
                }
            ],
            'code_name',

            [
                'attribute' => 'created_by',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->created_by) {
                        return $data->createdBy->username;
                    }
                    return null;
                },
            ],
            'created_at',
            [
                'attribute' => 'status',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->id) {
                        return EnumRoadTypeStatus::getStatusHtml($data, 'index');
                    }
                },
                'filter'    =>  ArrayHelper::map(EnumRoadTypeStatus::getStatusForSelect(), 'id', 'value'),
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
