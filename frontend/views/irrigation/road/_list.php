<?php

use settings\repositories\irrigation\RoadIrrigationTaskRepository;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/* @var $model settings\entities\irrigation\Road */
/* @var $key int*/
$roadIrrigationDate = (new RoadIrrigationTaskRepository())->findOneColorStatus($model->id);
echo "<pre>";
print_r($model);
?>

<div class="col-md-6 col-xl-4" data-key="<?=$key?>">
    <a href="<?= Url::to(['irrigation/road/road-list-irrigation-task-create', 'id' => $model->id])?>">
        <div class="card bg-<?= $roadIrrigationDate->watering_time <= date('Y-m-d H:i:s') ? 'danger' : 'primary'?> text-white mb-3">
            <div class="card-header"><b><?=$model->type->code_name . $model->code_name?></b> "<?=$model->title_oz;?>" <?=$model->start_km . '-' . $model->end_km?> km</div>
            <div class="card-body">
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('district_id')?>:</b> <?=$model->district->title_oz;?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('address')?>:</b> <?=strip_tags($model->address);?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('field_number')?>:</b> <?=strip_tags($model->field_number);?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('coordination')?>:</b> <?=strip_tags($model->coordination);?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('enterprise_expert_id')?>:</b> <?=$model->enterpriseExpert->first_name . ' ' . $model->enterpriseExpert->last_name?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('plot_chief_id')?>:</b> <?=$model->plotChief->first_name . ' ' . $model->plotChief->last_name?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('water_employee_id')?>:</b> <?=$model->waterEmployee->first_name . ' ' . $model->waterEmployee->last_name?></h6>
                <h6 class="card-title text-white"><b><?=$roadIrrigationDate->start_time?></b> dan <b><?=$roadIrrigationDate->end_time?></b> gacha </h6>
                <h6 class="card-title text-white"><b><?=$roadIrrigationDate->how_long?></b></h6>
                <h6 class="card-title text-white"><b>Suv quyish vaqti:</b> <?=$roadIrrigationDate->watering_time?></h6>
            </div>
        </div>
    </a>
</div>