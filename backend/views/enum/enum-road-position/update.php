<?php

use settings\entities\enums\EnumRoadPosition;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model EnumRoadPosition */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->title_uz
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lavozimlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_uz, 'url' => ['view', 'id' => $model->id]];
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
