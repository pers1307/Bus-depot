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
 * @property BusType $idType
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
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => BusType::className(), 'targetAttribute' => ['id_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => 'Идентификатор',
            'number'   => 'Номер',
            'id_type'  => 'Тип автобуса Идентификатор',
            'typeName' => 'Тип автобуса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdType()
    {
        return $this->hasOne(BusType::className(), ['id' => 'id_type']);
    }

    public function getTypeName()
    {
        return $this->idType->name;
    }
}
