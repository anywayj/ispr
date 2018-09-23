<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Session;

/**
 * SessionSearch represents the model behind the search form of `common\models\Session`.
 */
class SessionSearch extends Session
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Session_id', 'Plan_id', 'Student_id', 'Raiting_classic'], 'integer'],
            [['Raiting_100'], 'number'],
            [['Raiting_ETS', 'Raiting_date'], 'safe'],
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
        $query = Session::find()->with('students','plan');

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
            'Session_id' => $this->Session_id,
            'Plan_id' => $this->Plan_id,
            'Student_id' => $this->Student_id,
            'Raiting_100' => $this->Raiting_100,
            'Raiting_classic' => $this->Raiting_classic,
            'Raiting_date' => $this->Raiting_date,
        ]);

        $query->andFilterWhere(['like', 'Raiting_ETS', $this->Raiting_ETS]);

        return $dataProvider;
    }
}
