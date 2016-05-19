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
            [['start_date', 'end_date'], 'safe'],
            [['id_driver', 'wrong', 'id_reason'], 'integer'],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'id_driver' => 'Id Driver',
            'wrong' => 'Wrong',
            'id_reason' => 'Id Reason',
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
