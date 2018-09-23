<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CurrentEstimates;

/**
 * CurrentEstimatesSearch represents the model behind the search form of `common\models\CurrentEstimates`.
 */
class CurrentEstimatesSearch extends CurrentEstimates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estimates_id', 'Student_id', 'Plan_id', 'View_id', 'Vh_control', 'KR_1', 'KR_2', 'KR_3', 'KR_4', 'LR_1', 'LR_3', 'LR_4', 'LR_5', 'LR_6', 'LR_7', 'LR_8', 'LR_9', 'LR_10', 'LR_11', 'LR_12', 'LR_13', 'LR_14', 'LR_15', 'Sum_mark'], 'integer'],
            [['Date', 'LR_2', 'Start_year', 'Course'], 'safe'],
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
        $query = CurrentEstimates::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'estimates_id' => $this->estimates_id,
            'Student_id' => $this->Student_id,
            'Plan_id' => $this->Plan_id,
            'View_id' => $this->View_id,
            'Vh_control' => $this->Vh_control,
            'Date' => $this->Date,
            'KR_1' => $this->KR_1,
            'KR_2' => $this->KR_2,
            'KR_3' => $this->KR_3,
            'KR_4' => $this->KR_4,
            'LR_1' => $this->LR_1,
            'LR_3' => $this->LR_3,
            'LR_4' => $this->LR_4,
            'LR_5' => $this->LR_5,
            'LR_6' => $this->LR_6,
            'LR_7' => $this->LR_7,
            'LR_8' => $this->LR_8,
            'LR_9' => $this->LR_9,
            'LR_10' => $this->LR_10,
            'LR_11' => $this->LR_11,
            'LR_12' => $this->LR_12,
            'LR_13' => $this->LR_13,
            'LR_14' => $this->LR_14,
            'LR_15' => $this->LR_15,
            'Sum_mark' => $this->Sum_mark,
        ]);

        $query->andFilterWhere(['like', 'LR_2', $this->LR_2])
            ->andFilterWhere(['like', 'Start_year', $this->Start_year])
            ->andFilterWhere(['like', 'Course', $this->Course]);

        return $dataProvider;
    }
}
