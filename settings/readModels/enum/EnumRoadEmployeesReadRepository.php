<?php

namespace settings\readModels\enum;

use settings\entities\enums\EnumRoadEmployees;
use settings\forms\enum\search\EnumRoadEmployeesSearchForm;
use yii\data\ActiveDataProvider;

class EnumRoadEmployeesReadRepository
{
    public function search(EnumRoadEmployeesSearchForm $form): ActiveDataProvider
    {
        $query = EnumRoadEmployees::find()->orderBy('id desc');

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'id' => $form->id,
            'gender' => $form->gender,
            'status' => $form->status,
            'position_id' => $form->position_id,
            'region_id' => $form->region_id,
            'district_id' => $form->district_id,
            'created_by' => $form->created_by,
            'updated_by' => $form->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'first_name', $form->first_name])
            ->andFilterWhere(['ilike', 'last_name', $form->last_name])
            ->andFilterWhere(['ilike', 'middle_name', $form->middle_name])
            ->andFilterWhere(['ilike', 'birthday', $form->birthday])
            ->andFilterWhere(['ilike', 'phone', $form->phone])
            ->andFilterWhere(['ilike', 'code_position', $form->code_position])
            ->andFilterWhere(['ilike', 'email', $form->email])
            ->andFilterWhere(['ilike', 'address', $form->address])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $form->updated_at]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }
}