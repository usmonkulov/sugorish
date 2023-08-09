<?php

namespace settings\forms\enum;

use settings\entities\enums\EnumRoadPosition;
use settings\forms\enum\traits\EnumRoadPositionTrait;
use yii\base\Model;

class EnumRoadPositionForm extends Model
{

    use EnumRoadPositionTrait;

    public function rules()
    {
        return [
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique', 'targetClass' => EnumRoadPosition::class, 'filter' =>  $this->code_name ? ['<>', 'code_name', $this->code_name] : null, 'targetAttribute' => ['code_name']],
            [['title_oz'], 'unique', 'targetClass' => EnumRoadPosition::class, 'filter' =>  $this->title_oz ? ['<>', 'title_oz', $this->title_oz] : null, 'targetAttribute' => ['title_oz']],
            [['title_ru'], 'unique', 'targetClass' => EnumRoadPosition::class, 'filter' =>  $this->title_ru ? ['<>', 'title_ru', $this->title_ru] : null, 'targetAttribute' => ['title_ru']],
            [['title_uz'], 'unique', 'targetClass' => EnumRoadPosition::class, 'filter' =>  $this->title_uz ? ['<>', 'title_uz', $this->title_uz] : null, 'targetAttribute' => ['title_uz']],
        ];
    }
}