<?php


namespace settings\readModels\irrigation;


use settings\entities\irrigation\RoadIrrigationTask;
use settings\forms\irrigation\search\RoadIrrigationTaskSearchForm;
use yii\data\ActiveDataProvider;

class RoadIrrigationTaskReadRepository
{
    public function search(RoadIrrigationTaskSearchForm $form): ActiveDataProvider
    {
        $query = RoadIrrigationTask::find()->andWhere(['status' => 1])->orderBy('id desc');

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'status' =>         $form->status,
            'id' =>             $form->id,
            'road_id' =>        $form->road_id,
            'created_by' =>     $form->created_by,
            'updated_by' =>     $form->updated_by
        ]);

        $query
            ->andFilterWhere(['ilike', 'start_time', $form->start_time])
            ->andFilterWhere(['ilike', 'end_time', $form->end_time])
            ->andFilterWhere(['ilike', 'content', $form->content])
            ->andFilterWhere(['ilike', 'description', $form->description])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
        ;

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }
}