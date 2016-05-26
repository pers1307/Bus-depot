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
            [['id_class', 'start_work_date'], 'required'],
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
            'id' => 'Идентификатор',
            'id_class' => 'Идентификатор класса',
            'start_work_date' => 'Время начала работы',
            'salary' => 'Зарплата',
            'id_bus' => 'Идентификатор автобуса',
            'id_route' => 'Идентификатор маршрута',
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
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(PassportData::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::className(), ['id_driver' => 'id']);
    }
}
