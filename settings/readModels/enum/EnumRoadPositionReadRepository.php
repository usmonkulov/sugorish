<?php

namespace settings\readModels\enum;

use settings\entities\enums\EnumRoadPosition;
use settings\forms\enum\search\EnumRoadPositionSearchForm;
use yii\data\ActiveDataProvider;

class EnumRoadPositionReadRepository
{
    public function search(EnumRoadPositionSearchForm $form): ActiveDataProvider
    {
        $query = EnumRoadPosition ::find()->orderBy('id desc');

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'id' => $form->id,
            'status' => $form->status,
            'updated_by' => $form->updated_by,
            'created_by' => $form->created_by,
            'created_at' => $form->created_at,
            'updated_at' => $form->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'title_uz', $form->title_uz])
            ->andFilterWhere(['ilike', 'title_oz', $form->title_oz])
            ->andFilterWhere(['ilike', 'title_ru', $form->title_ru])
            ->andFilterWhere(['ilike', 'code_name', $form->code_name]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }
}