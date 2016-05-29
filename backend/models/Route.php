<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property string $id
 * @property string $number
 * @property string $start_id_station
 * @property string $end_id_station
 * @property double $interval
 * @property double $duration
 *
 * @property Station $endIdStation
 * @property Station $startIdStation
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_id_station', 'end_id_station'], 'integer'],
            [['interval', 'duration'], 'number'],
            [['number'], 'string', 'max' => 255],
            [['end_id_station'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['end_id_station' => 'id']],
            [['start_id_station'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['start_id_station' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'               => 'Идентификатор',
            'number'           => 'Номер',
            'start_id_station' => 'Начальная станция',
            'end_id_station'   => 'Конечная станция',
            'interval'         => 'Интервал движения в минутах',
            'duration'         => 'Длительность в минутах',
            'startStationName' => 'Начальная станция',
            'endStationName'   => 'Конечная станция',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStartIdStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'start_id_station']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndIdStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'end_id_station']);
    }

    /**
     * @return string
     */
    public function getStartStationName()
    {
        return $this->startIdStation->name;
    }

    /**
     * @return string
     */
    public function getEndStationName()
    {
        return $this->endIdStation->name;
    }
}
