<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProgressInPublic;

/**
 * ProgressInPublicSearch represents the model behind the search form of `common\models\ProgressInPublic`.
 */
class ProgressInPublicSearch extends ProgressInPublic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_progress_public', 'public_id', 'Student_id', 'more_rank', 'place', 'number'], 'integer'],
            [['date', 'sum1'], 'safe'],
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
        $query = ProgressInPublic::find()->with('students','public');

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
            'id_progress_public' => $this->id_progress_public,
            'public_id' => $this->public_id,
            'Student_id' => $this->Student_id,
            'more_rank' => $this->more_rank,
            'place' => $this->place,
            'number' => $this->number,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'sum1', $this->sum1]);

        return $dataProvider;
    }
}
