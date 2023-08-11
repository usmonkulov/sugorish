<?php

use settings\forms\enum\EnumRoadEmployeesForm;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $form EnumRoadEmployeesForm */
/* @var $model null*/


$this->title = Yii::t('app','Hodim yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Hodimlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

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
                            ['create'],
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
