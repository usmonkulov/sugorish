<?php

use kartik\select2\Select2;
use settings\entities\enums\EnumRegions;
use settings\status\irrigation\RoadStatus;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchForm backend\forms\irrigation\RoadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', "Yo'llar");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list',['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
    ]); ?>
</div>