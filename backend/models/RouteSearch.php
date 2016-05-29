<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Route;

/**
 * RouteSearch represents the model behind the search form about `backend\models\Route`.
 */
class RouteSearch extends Route
{
    /**
     * @var string
     */
    public $startStationName;

    /**
     * @var string
     */
    public $endStationName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'start_id_station', 'end_id_station'], 'integer'],
            [['number', 'startStationName', 'endStationName', 'interval', 'duration'], 'safe'],
            [['interval', 'duration'], 'number'],
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
        $query = Route::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'startStationName' => [
                    'asc' => ['ss.name' => SORT_ASC],
                    'desc' => ['ss.name' => SORT_DESC],
                    'label' => 'Станция отправки'
                ],
                'endStationName' => [
                    'asc' => ['es.name' => SORT_ASC],
                    'desc' => ['es.name' => SORT_DESC],
                    'label' => 'Станция прибытия'
                ],
                'number' => [
                    'asc' => ['number' => SORT_ASC],
                    'desc' => ['number' => SORT_DESC],
                ],
                'interval' => [
                    'asc' => ['interval' => SORT_ASC],
                    'desc' => ['interval' => SORT_DESC],
                ],
                'duration' => [
                    'asc' => ['duration' => SORT_ASC],
                    'desc' => ['duration' => SORT_DESC],
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['startIdStation ss']);
            $query->joinWith(['endIdStation es']);

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'start_id_station' => $this->start_id_station,
            'end_id_station' => $this->end_id_station,
            'interval' => $this->interval,
            'duration' => $this->duration,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number]);

        $query->joinWith(['startIdStation ss' => function ($q) {
            $q->where('ss.name LIKE "%' . $this->startStationName . '%"');
        }]);

        $query->joinWith(['endIdStation es' => function ($q) {
            $q->where('es.name LIKE "%' . $this->endStationName . '%"');
        }]);

        return $dataProvider;
    }
}
