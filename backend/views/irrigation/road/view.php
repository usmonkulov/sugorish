<?php

use andrewdanilov\yandexmap\YandexMap;
use settings\status\irrigation\RoadStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model settings\entities\irrigation\Road */

$this->title = $model->title_oz;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', "Yo'llar"), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="road-view">
    <div class="box box-info">
        <div class="box-body">
    <p>
        <?= Html::a(
            '<i class="fa fa-pencil"></i>',
            ['update', 'id' => $model->id],
            ['title' => Yii::t('yii','Tahrirlash'),'class' => 'btn btn-primary'])
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
        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_oz',
            [
                'attribute' => 'type_id',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->type_id) {
                        return $data->type->code_name . $data->code_name;
                    }
                    return null;
                },
            ],
            [
                'label' => Yii::t('app', "Km oralig'ida"),
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->start_km && $data->end_km) {
                        return $data->start_km . '-' . $data->end_km;
                    }
                    return null;
                },
            ],
            'field_number',
            'address:html',
            [
                'attribute' => 'coordination',
                'format'    => 'raw',
                'value'     => function ($data) {
                    if ($data->coordination) {
                         return YandexMap::widget([
                            'id'  => 'some-unique-dom-id', // optional, an ID applied to widget wrapper
                            'apikey' => '', // optional, yandex map api key
                            'center' => [
                                'latitude' => explode (",", $data->coordination)[0],
                                'longitude' => explode (",", $data->coordination)[1],
                            ],
                            'zoom' => 19, // optional, default 12
                            'points' => [
                                [
                                    'id' => $data->id,
                                    'title' => $data->type->code_name . $data->code_name . ' ' . $data->title_oz .' '. $data->coordination,
                                    'text' => $data->address,
                                    'color' => '#0000ff',
                                    'latitude' => explode (",", $data->coordination)[0],
                                    'longitude' => explode (",", $data->coordination)[1],
                                ],
                            ],
                            //'pointsUrl' => '/points.json', // url used to get an array of points instead of manual setting the 'points' param
                            'scroll' => true, // optional, zoom map by scrolling, default false
                            'wrapperTag' => 'div', // optional, html tag to wrap the map, default 'div'
                            'wrapperOptions' => [ // optional, attributes passed to \yii\helpers\Html::tag() method for constructing map wrapper
                                'class' => 'map-wrapper',
                                'style' => 'width:35%;height:200px;',
                            ],
                            'jsPointsClickCallback' => 'myCallback',
                        ]);
                    }
                    return null;
                },
            ],
            [
                'attribute' => 'district_id',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->district_id) {
                        return $data->district->title_oz;
                    }
                    return null;
                },
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
            ],
            [
                'attribute' => 'status',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->id) {
                        return RoadStatus::getStatusHtml($data, 'view');
                    }
                },
            ],
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
                'attribute' => 'updated_by',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->updated_by) {
                        return $data->updatedBy->username;
                    }
                    return null;
                },
            ],
            'updated_at',
        ],
    ]) ?>
        </div>
    </div>
</div>
