<?php

namespace settings\forms\enum;

use settings\entities\enums\EnumRoadType;
use settings\forms\enum\traits\EnumRoadTypeTrait;
use yii\base\Model;

class EnumRoadTypeForm extends Model
{

    use EnumRoadTypeTrait;

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'string', 'max' => 255],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'unique', 'targetClass' => EnumRoadType::class, 'filter' => $this->title_uz ? ['<>', 'title_uz', $this->title_uz] : null,'targetAttribute' => ['title_uz', 'title_oz', 'title_ru', 'code_name']],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'unique', 'targetClass' => EnumRoadType::class, 'filter' => $this->title_oz ? ['<>', 'title_oz', $this->title_oz] : null,'targetAttribute' => ['title_uz', 'title_oz', 'title_ru', 'code_name']],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'unique', 'targetClass' => EnumRoadType::class, 'filter' => $this->title_ru ? ['<>', 'title_ru', $this->title_ru] : null,'targetAttribute' => ['title_uz', 'title_oz', 'title_ru', 'code_name']],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'unique', 'targetClass' => EnumRoadType::class, 'filter' => $this->code_name ? ['<>', 'code_name', $this->code_name] : null,'targetAttribute' => ['title_uz', 'title_oz', 'title_ru', 'code_name']],
        ];
    }
}