<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bus_type".
 *
 * @property string $id
 * @property string $name
 * @property integer $capacity
 *
 * @property Bus $id0
 */
class BusType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capacity'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['id' => 'id_type']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'capacity' => 'Capacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id_type' => 'id']);
    }
}
