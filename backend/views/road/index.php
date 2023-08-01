<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel settings\forms\search\RoadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Road', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'road_name',
            'code_name',
            'address:ntext',
            'coordination:ntext',
            //'enterprise_expert:ntext',
            //'plot_chief:ntext',
            //'water_employee:ntext',
            //'status',
            //'image_url:ntext',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
