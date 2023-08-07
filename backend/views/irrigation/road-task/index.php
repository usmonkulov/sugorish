<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel settings\forms\search\RoadTaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Road Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Road Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'road_id',
            'start_time',
            'end_time',
            'status',
            //'status_color',
            //'description',
            //'content',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
