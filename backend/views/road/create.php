<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model settings\entities\road\Road */

$this->title = 'Create Road';
$this->params['breadcrumbs'][] = ['label' => 'Roads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
