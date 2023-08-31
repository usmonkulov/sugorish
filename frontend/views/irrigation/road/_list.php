<?php

use settings\repositories\irrigation\RoadIrrigationTaskRepository;
use settings\status\irrigation\RoadIrrigationTaskStatus;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $model settings\entities\irrigation\Road */
/* @var $key int*/
$roadIrrigationDate = (new RoadIrrigationTaskRepository())->findOneColorStatus($model->id);
?>

<div class="col-md-6 col-xl-4" data-key="<?=$key?>">
    <a href="<?= Url::to(['irrigation/road/road-list-irrigation-task-create', 'id' => $model['id']])?>">
        <div class="card bg-<?= $model['watering_time'] <= date('Y-m-d H:i:s') ? 'danger' : 'primary'?> text-white mb-3">
            <div class="card-header"><?=$model['road_full_name']?></div>
            <div class="card-body">
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Tuman");?>:</b> <?=$model['district_title'];?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Yo'l manzili");?>:</b> <?=strip_tags($model['address']);?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Maydon raqami");?>:</b> <?=$model['field_number'];?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Kordinatasi");?>:</b> <?=$model['coordination'];?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Korxona hodimi");?>:</b> <?=$model['enterprise_expert_full_name'];?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Uchastka boshlig'i");?>:</b> <?=$model['plot_chief_full_name'];?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Ma'sul ishchi");?>:</b> <?=$model['water_employee_full_name'];?></h6>
                <h6 class="card-title text-white"><?=$model['start_end_time']; ?></h6>
                <h6 class="card-title text-white"><b><?=$model['how_long'];?></b></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Suv quyish vaqti");?>:</b> <?=date('Y-m-d H:i', strtotime($model['watering_time']))?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Izoh bildirilgan");?>:</b> <?=$model['content'];?></h6>
                <h6 class="card-title text-white"><b><?=Yii::t('app', "Grafikni yaratdi");?>:</b> <?= $model['username']?></h6>
            </div>
        </div>
    </a>
</div>