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
 * @property Bus[] $buses
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'name' => 'Название',
            'capacity' => 'Вместимость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Bus::className(), ['id_type' => 'id']);
    }
}
