<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Teachers;

/**
 * SearchTeachers represents the model behind the search form of `common\models\Teachers`.
 */
class SearchTeachers extends Teachers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher_id'], 'integer'],
            [['Teacher_FIO', 'Teacher_surname', 'Teacher_name', 'Teacher_lastname', 'Teacher_phone', 'Teacher_email', 'image'], 'safe'],
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
        $query = Teachers::find();

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
            'Teacher_id' => $this->Teacher_id,
        ]);

        $query->andFilterWhere(['like', 'Teacher_FIO', $this->Teacher_FIO])
            ->andFilterWhere(['like', 'Teacher_surname', $this->Teacher_surname])
            ->andFilterWhere(['like', 'Teacher_name', $this->Teacher_name])
            ->andFilterWhere(['like', 'Teacher_lastname', $this->Teacher_lastname])
            ->andFilterWhere(['like', 'Teacher_phone', $this->Teacher_phone])
            ->andFilterWhere(['like', 'Teacher_email', $this->Teacher_email])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
