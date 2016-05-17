<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property string $id
 * @property string $number
 * @property string $id_type
 *
 * @property BusType $busType
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_type'], 'integer'],
            [['number'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'id_type' => 'Id Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusType()
    {
        return $this->hasOne(BusType::className(), ['id' => 'id_type']);
    }
}
