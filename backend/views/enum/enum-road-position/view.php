<?php

use settings\entities\enums\EnumRoadPosition;
use settings\status\enum\EnumRoadPositionStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model EnumRoadPosition */

$this->title = $model->title_uz;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lavozimlar'), 'url' => ['index']];
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
            'title_uz',
            'title_oz',
            'title_ru',
            'code_name',
            [
                'attribute' => 'status',
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->id) {
                        return EnumRoadPositionStatus::getStatusHtml($data, 'view');
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
