<?php

use settings\entities\enums\EnumRoadEmployees;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model EnumRoadEmployees */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->first_name
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hodimlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="road-update">

    <div class="row">
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <p class="box-title">
                        <?= Html::a(
                            '<i class="fa fa-home"></i>',
                            ['/'],
                            ['class' => 'btn btn-default', 'title' => Yii::t('yii','Home')])
                        ?>

                        <?= Html::a(
                            '<i class="fa fa-rotate-right"></i>',
                            ['update', 'id' => $model->id],
                            ['title' => Yii::t('yii','Qayta yuklash'), 'class' => 'btn btn-info'])
                        ?>

                        <?= Html::a(
                            '<i class="fa fa-share-square-o"></i>',
                            ['index'], ['title' => Yii::t('yii', 'Orqaga'), 'class' => 'btn btn-success'])
                        ?>
                    </p>
                </div>
                <!-- /.box-header -->
                <?= $this->render('_form', [
                    'form' => $form,
                    'model' => $model
                ]) ?>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->

</div>
