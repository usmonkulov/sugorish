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
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchForm RoadSearchForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', "Yo'llar");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">
    <h5 class="pb-1 mb-4"><?=Yii::t('app',"Samarqandyo'lko'kalam UK")?><br><?=Yii::t('app',"sug'orish grafigi")?></h5>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list',[
                'model' => $model,
                'key' => $key
            ]);
        },
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