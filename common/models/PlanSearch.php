<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Plan;

/**
 * PlanSearch represents the model behind the search form of `common\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Plan_id', 'Discipline_id', 'Speciality_id', 'Lecture_hours', 'LR_hours', 'Practice_hours', 'Credits', 'Semester', 'Actuality'], 'integer'],
            [['view_control', 'Start_date', 'End_date', 'discipline_one', 'discipline_two', 'discipline_three', 'Course'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Plan::find()->with('discipline');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 10,
        ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Plan_id' => $this->Plan_id,
            'Discipline_id' => $this->Discipline_id,
            'Speciality_id' => $this->Speciality_id,
            'Lecture_hours' => $this->Lecture_hours,
            'LR_hours' => $this->LR_hours,
            'Practice_hours' => $this->Practice_hours,
            'Credits' => $this->Credits,
            'Start_date' => $this->Start_date,
            'End_date' => $this->End_date,
            'Semester' => $this->Semester,
            'Actuality' => $this->Actuality,
        ]);

        $query->andFilterWhere(['like', 'view_control', $this->view_control])
            ->andFilterWhere(['like', 'discipline_one', $this->discipline_one])
            ->andFilterWhere(['like', 'discipline_two', $this->discipline_two])
            ->andFilterWhere(['like', 'discipline_three', $this->discipline_three])
            ->andFilterWhere(['like', 'Course', $this->Course]);

        return $dataProvider;
    }
}
