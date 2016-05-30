<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property string $id
 * @property string $start_date
 * @property string $end_date
 * @property string $id_driver
 * @property integer $wrong
 * @property integer $id_reason
 *
 * @property Driver $idDriver
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'id_driver'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            //['end_date', 'compare', 'compareValue' => 'start_date', 'operator' => '>='],
            [['id_driver', 'id_reason'], 'integer'],
            [['id_driver'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['id_driver' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Дата и время отправки',
            'end_date' => 'Дата и время прибытия',
            'id_driver' => 'Водитель',
            'wrong' => 'Отменить рейс',
            'id_reason' => 'Причина отмены',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'id_driver']);
    }
}
