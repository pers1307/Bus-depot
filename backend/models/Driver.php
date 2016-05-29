<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property string $id
 * @property string $id_class
 * @property string $start_work_date
 * @property double $salary
 * @property integer $id_bus
 * @property integer $id_route
 *
 * @property DriverClass $idClass
 * @property PassportData $id0
 * @property Flight[] $flights
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_class', 'start_work_date', 'salary'], 'required'],
            [['id_class', 'id_bus', 'id_route'], 'integer'],
            [['start_work_date'], 'safe'],
            [['salary'], 'number'],
            [['id_class'], 'exist', 'skipOnError' => true, 'targetClass' => DriverClass::className(), 'targetAttribute' => ['id_class' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => PassportData::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'Идентификатор',
            'id_class'        => 'Класс водителя',
            'start_work_date' => 'Дата начала работы',
            'salary'          => 'Зарплата',
            'id_bus'          => 'Идентификатор автобуса',
            'id_route'        => 'Идентификатор маршрута',
            'name'            => 'Имя',
            'surname'         => 'Фамилия',
            'driverClass'     => 'Класс водителя',
            'experience'      => 'Стаж',
            //'busNumber'       => 'Номер автобуса',
            //'routeNumber'     => 'Номер маршрута'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClass()
    {
        return $this->hasOne(DriverClass::className(), ['id' => 'id_class']);
    }

    /**
     * @return mixed
     */
    public function getDriverClass()
    {
        return $this->idClass->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassportData()
    {
        return $this->hasOne(PassportData::className(), ['id' => 'id']);
    }

    public function getName()
    {
        return $this->passportData->name;
    }

    public function getSurname()
    {
        return $this->passportData->surname;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::className(), ['id_driver' => 'id']);
    }

    public function getExperience()
    {
        return date('Y') - \Yii::$app->formatter->asDate($this->start_work_date, 'yyyy');
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getBus()
//    {
//        return $this->hasOne(Bus::className(), ['id' => 'id_bus']);
////        return Driver::find()
////            ->leftJoin('bus', 'driver.id_bus = bus.id');
//
//        return $this
//            ->leftJoin('bus as bus', 'driver.id_bus = bus.id');
//
//        //return 'LEFT JOIN `bus` b ON driver.id_bus = b.id';
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getRoute()
//    {
//        return $this->hasOne(Route::className(), ['id' => 'id_route']);
//    }
//
//    public function getBusNumber()
//    {
//        return $this->bus->number;
//    }
//
//    public function getRouteNumber()
//    {
//        return $this->route->number;
//    }
}
