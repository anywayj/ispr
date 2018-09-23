<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Disciplines;

/**
 * DisciplinesSearch represents the model behind the search form of `common\models\Disciplines`.
 */
class DisciplinesSearch extends Disciplines
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Discipline_id'], 'integer'],
            [['Discipline_name'], 'safe'],
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
        $query = Disciplines::find();

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
            'Discipline_id' => $this->Discipline_id,
        ]);

        $query->andFilterWhere(['like', 'Discipline_name', $this->Discipline_name]);

        return $dataProvider;
    }
}
