<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model settings\entities\road\RoadTask */

$this->title = 'Create Road Task';
$this->params['breadcrumbs'][] = ['label' => 'Road Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
