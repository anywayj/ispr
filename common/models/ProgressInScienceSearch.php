<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProgressInScience;

/**
 * ProgressInScienceSearch represents the model behind the search form of `common\models\ProgressInScience`.
 */
class ProgressInScienceSearch extends ProgressInScience
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_progress_science', 'science_id', 'Student_id', 'more_rank', 'place', 'number'], 'integer'],
            [['sum1'],'string'], 
            [['date'], 'safe'],
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
        $query = ProgressInScience::find()->with('students','sciences');
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
            'id_progress_science' => $this->id_progress_science,
            'science_id' => $this->science_id,
            'Student_id' => $this->Student_id,
            'more_rank' => $this->more_rank,
            'place' => $this->place,
            'number' => $this->number,
            'date' => $this->date,
            'sum1' => $this->sum1,
        ]);

        return $dataProvider;
    }
}
