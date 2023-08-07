<?php

namespace settings\readModels\irrigation;

use settings\entities\irrigation\Road;
use settings\forms\irrigation\search\RoadSearchForm;
use yii\data\ActiveDataProvider;

class RoadReadRepository
{
    public function search(RoadSearchForm $form): ActiveDataProvider
    {
        $query = Road::find()->andWhere(['status' => 1])->orderBy('id desc');

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

        $query->andFilterWhere(['ilike', 'address', $form->address])
            ->andFilterWhere(['ilike', 'water_employee', $form->water_employee])
            ->andFilterWhere(['ilike', 'road_name', $form->road_name])
            ->andFilterWhere(['ilike', 'plot_chief', $form->plot_chief])
            ->andFilterWhere(['ilike', 'code_name', $form->code_name])
            ->andFilterWhere(['ilike', 'image_url', $form->image_url])
            ->andFilterWhere(['ilike', 'coordination', $form->coordination])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $form->updated_at])
            ->andFilterWhere(['ilike', 'enterprise_expert', $form->enterprise_expert]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }
}