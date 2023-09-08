<?php

use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadEmployees;
use settings\entities\enums\EnumRoadPosition;
use settings\entities\enums\EnumRoadType;
use settings\entities\irrigation\Road;
use settings\entities\irrigation\RoadIrrigationTask;
use settings\forms\irrigation\search\RoadSearchForm;
use settings\status\GeneralStatus;
use settings\status\irrigation\RoadIrrigationTaskStatus;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchForm RoadSearchForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', "Yo'llar");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">
    <h5 class="pb-1 mb-4"><?=Yii::t('app',"Samarqandyo'lko'kalam UK")?><br><?=Yii::t('app',"sug'orish grafigi")?></h5>
    <div class="row">
        <!-- Basic Buttons -->
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="demo-inline-spacing">

                        <?= Html::a(Yii::t('app', "Barchasini ko'rish"), ['per-page' => $dataProvider->getCount()], ['class' => 'btn btn-danger']) ?>
                        <?= Html::a(Yii::t('app', "100 tani ko'rish"), ['per-page' => 100], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', "10 tani ko'rish"), ['per-page' => 10], ['class' => 'btn btn-info']) ?>

                    </div>
                </div>
                <hr class="m-0">
            </div>
        </div>
    </div>

<!--    --><?php // echo $this->render('_search', ['model' => $searchForm]); ?>

    <?= ListView::widget([
        'pager' => [
            'pagination' => null
        ],
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list',[
                'model' => $model,
                'key' => $key
            ]);
        },
        'layout' => "<div class='lst row'>{items}</div><div>{pager}</div>",
        'itemOptions' => [
            'tag' => false,
        ],

        'options' => [
            'id' => false,
            'tag' => 'div',
            'class' => 'row'
        ],
    ]); ?>
</div>