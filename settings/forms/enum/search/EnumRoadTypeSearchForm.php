<?php

namespace settings\forms\enum\search;

use settings\forms\enum\traits\EnumRoadTypeTrait;
use yii\base\Model;

class EnumRoadTypeSearchForm extends Model
{
    use EnumRoadTypeTrait;

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['title_uz', 'title_oz', 'title_ru', 'code_name', 'created_by'], 'required'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique'],
            [['title_oz'], 'unique'],
            [['title_ru'], 'unique'],
            [['title_uz'], 'unique'],
        ];
    }
}