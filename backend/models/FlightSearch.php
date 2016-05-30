<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Flight;

/**
 * FlightSearch represents the model behind the search form about `backend\models\Flight`.
 */
class FlightSearch extends Flight
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_driver', 'wrong', 'id_reason'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
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
        $query = Flight::find();

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
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'id_driver' => $this->id_driver,
            'wrong' => $this->wrong,
            'id_reason' => $this->id_reason,
        ]);

        return $dataProvider;
    }
}
