<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Driver;

/**
 * DriverSearch represents the model behind the search form about `backend\models\Driver`.
 */
class DriverSearch extends Driver
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $surname;

    /**
     * @var string
     */
    public $driverClass;

    /**
     * @var string
     */
    public $experience;

    /**
     * @var string
     */
    //public $busNumber;

    /**
     * @var string
     */
    //public $routeNumber;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_class', 'id_bus', 'id_route'], 'integer'],
            //[['start_work_date', 'name', 'surname', 'driverClass', 'experience', 'busNumber', 'routeNumber'], 'safe'],
            [['start_work_date', 'name', 'surname', 'driverClass', 'experience'], 'safe'],
            [['salary'], 'number'],
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
        $query = Driver::find()
            //->select('{{driver}}.*', '{{bus}}.number', '{{route}}.*')
            ->leftJoin('bus as bus', 'id_bus = bus.id')
            ->leftJoin('route as route', 'id_route = route.id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'driverClass' => [
                    'asc' => ['class.name' => SORT_ASC],
                    'desc' => ['class.name' => SORT_DESC],
                    'label' => 'Класс'
                ],
                'name' => [
                    'asc' => ['passport_data.name' => SORT_ASC],
                    'desc' => ['passport_data.name' => SORT_DESC],
                    'label' => 'Класс'
                ],
                'surname' => [
                    'asc' => ['passport_data.name' => SORT_ASC],
                    'desc' => ['passport_data.name' => SORT_DESC],
                    'label' => 'Класс'
                ],
                'experience' => [
                    'desc' => ['start_work_date' => SORT_ASC],
                    'asc' => ['start_work_date' => SORT_DESC],
                    'label' => 'Стаж'
                ],
//                'busNumber' => [
//                    'asc' => ['bus.number' => SORT_ASC],
//                    'desc' => ['bus.number' => SORT_DESC],
//                    'label' => 'Номер автобуса'
//                ],
//                'routeNumber' => [
//                    'asc' => ['route.number' => SORT_ASC],
//                    'desc' => ['route.number' => SORT_DESC],
//                    'label' => 'Номер маршрута'
//                ],
            ]
        ]);

        $params['DriverSearch']['start_work_date'] = $params['DriverSearch']['experience'];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            $query->joinWith(['passportData']);
            $query->joinWith(['idClass']);
            //$query->joinWith(['bus']);
            //$query->joinWith(['route']);

            return $dataProvider;
        }

        //var_dump($query->createCommand()->queryAll());
        //die;

        // grid filtering conditions
        $query->andFilterWhere([
            'id'              => $this->id,
            'id_class'        => $this->id_class,
            'start_work_date' => $this->start_work_date,
            'salary'          => $this->salary,
            'id_bus'          => $this->id_bus,
            'id_route'        => $this->id_route,
            //'busNumber' => $this->number,
        ]);

        $query->joinWith(['passportData' => function ($q) {
            $q->where('passport_data.name LIKE "%' . $this->name . '%"');
        }]);

        $query->joinWith(['passportData' => function ($q) {
            $q->where('passport_data.surname LIKE "%' . $this->surname . '%"');
        }]);

        if (!empty($this->start_work_date)) {
            //$query->where(['DATE(start_work_date) > '. $this->start_work_date]);

            //$query->andWhere('start_work_date > '. $this->start_work_date);
        }

        $query->joinWith(['idClass' => function ($q) {
            $q->where('class.name LIKE "%' . $this->driverClass . '%"');
        }]);

//        $query->joinWith(['bus' => function ($q) {
//            $q->where('bus.number LIKE "%' . $this->busNumber . '%"');
//        }]);
//
//        $query->joinWith(['route' => function ($q) {
//            $q->where('route.number LIKE "%' . $this->routeNumber . '%"');
//        }]);

        return $dataProvider;
    }
}
