<?php

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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?=Yii::t('app',"Yo'llar")?> /</span> <?=$this->title?></h4>
    <div class="card">
        <h5 class="card-header"><?=$this->title?></h5>
        <div class="table-responsive text-nowrap">
            <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'title_uz',
                        'title_oz',
                        'title_ru',
                        'km',
                        'code_name',
                        'address',
                        'coordination',
                        [
                            'attribute' => 'region_id',
                            'format'    => 'html',
                            'value'     => function ($data) {
                                if ($data->region_id) {
                                    return $data->region->title_oz;
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
                            'attribute' => 'type_id',
                            'format'    => 'html',
                            'value'     => function ($data) {
                                if ($data->type_id) {
                                    return $data->type->code_name . '(' . $data->type->title_oz .')';
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
                            'attribute' => 'image_url',
                            'value' => function ($model) {
                                return Html::img(Url::to($model->image_url), ['alt' => $model->title_oz]);
                            },
                            'format' => 'html',
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
