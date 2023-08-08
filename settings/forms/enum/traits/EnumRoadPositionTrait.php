<?php

namespace settings\forms\enum\traits;

use settings\entities\enums\EnumRoadPosition;

trait EnumRoadPositionTrait
{
    public $id;
    public $title_uz;
    public $title_oz;
    public $title_ru;
    public $code_name;
    public $status;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function attributeLabels(): array
    {
        $label = new EnumRoadPosition();
        return $label->attributeLabels();
    }
}