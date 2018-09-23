<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Students;

/**
 * StudentsSearch represents the model behind the search form of `common\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_id'], 'integer'],
            [['Student_FIO', 'Student_surname', 'Student_name', 'Student_lastname', 'Birhdate', 'Student_phone', 'Certificate_raiting', 'Certificate_ZNO_1', 'Certificate_ZNO_2', 'Certificate_ZNO_3', 'SR_ball_doc', 'Year', 'Class', 'Sum_ball','AvgRait','SumBall1','SumBall2'], 'safe'],
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
        $query = Students::find();

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
            'Student_id' => $this->Student_id,
            'Birhdate' => $this->Birhdate,
        ]);

        $query->andFilterWhere(['like', 'Student_FIO', $this->Student_FIO])
            ->andFilterWhere(['like', 'Student_surname', $this->Student_surname])
            ->andFilterWhere(['like', 'Student_name', $this->Student_name])
            ->andFilterWhere(['like', 'Student_lastname', $this->Student_lastname])
            ->andFilterWhere(['like', 'Student_phone', $this->Student_phone])
            ->andFilterWhere(['like', 'Certificate_raiting', $this->Certificate_raiting])
            ->andFilterWhere(['like', 'Certificate_ZNO_1', $this->Certificate_ZNO_1])
            ->andFilterWhere(['like', 'Certificate_ZNO_2', $this->Certificate_ZNO_2])
            ->andFilterWhere(['like', 'Certificate_ZNO_3', $this->Certificate_ZNO_3])
            ->andFilterWhere(['like', 'SR_ball_doc', $this->SR_ball_doc])
            ->andFilterWhere(['like', 'Year', $this->Year])
            ->andFilterWhere(['like', 'Class', $this->Class])
            ->andFilterWhere(['like', 'Sum_ball', $this->Sum_ball]);

        return $dataProvider;
    }
}
