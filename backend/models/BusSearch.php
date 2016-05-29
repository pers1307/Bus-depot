<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bus;

/**
 * BusSearch represents the model behind the search form about `backend\models\Bus`.
 */
class BusSearch extends Bus
{
    /**
     * @var string
     */
    public $typeName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_type'], 'integer'],
            [['number', 'typeName'], 'safe'],
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
        $query = Bus::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'typeName' => [
                    'asc' => ['bus_type.name' => SORT_ASC],
                    'desc' => ['bus_type.name' => SORT_DESC],
                    'label' => 'Тип автобуса'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            $query->joinWith(['idType']);

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_type' => $this->id_type,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number]);

        $query->joinWith(['idType' => function ($q) {
            $q->where('bus_type.name LIKE "%' . $this->typeName . '%"');
        }]);

        return $dataProvider;
    }
}
