<?php

namespace backend\forms;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class RoadSearch extends Model
{

    public $id;
    public $road_name;
    public $code_name;
    public $address;
    public $coordination;
    public $enterprise_expert;
    public $plot_chief;
    public $water_employee;
    public $status;
    public $image_url;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['id', 'road_name', 'code_name', 'address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'status', 'image_url'], 'integer'],
            [['username', 'email', 'role'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

//    /**
//     * @param array $params
//     * @return ActiveDataProvider
//     */
    public function search(array $params): ActiveDataProvider
    {
//        $query = User::find()->alias('u');

        $dataProvider = new ActiveDataProvider([
            'query' => '',
        ]);

//        $this->load($params);
//
//        if (!$this->validate()) {
//            $query->where('0=1');
//            return $dataProvider;
//        }
//
//        $query->andFilterWhere([
//            'u.id' => $this->id,
//            'u.status' => $this->status,
//        ]);
//
//        if (!empty($this->role)) {
//            $query->innerJoin('{{%auth_assignments}} a', 'a.user_id = u.id');
//            $query->andWhere(['a.item_name' => $this->role]);
//        }
//
//        $query
//            ->andFilterWhere(['like', 'u.username', $this->username])
//            ->andFilterWhere(['like', 'u.email', $this->email])
//            ->andFilterWhere(['>=', 'u.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
//            ->andFilterWhere(['<=', 'u.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }
//
//    public function rolesList(): array
//    {
//        return ArrayHelper::map(\Yii::$app->authManager->getRoles(), 'name', 'description');
//    }
}