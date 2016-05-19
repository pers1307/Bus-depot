<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "passport_data".
 *
 * @property string $id
 * @property string $name
 * @property string $patronymic
 * @property string $surname
 * @property string $birth
 * @property string $when
 * @property string $series
 * @property string $number
 * @property string $address
 * @property string $issued
 *
 * @property Driver $driver
 */
class PassportData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passport_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['birth', 'when'], 'safe'],
            [['address', 'issued'], 'string'],
            [['name', 'patronymic', 'surname', 'series', 'number'], 'string', 'max' => 255],
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
            'patronymic' => 'Patronymic',
            'surname' => 'Surname',
            'birth' => 'Birth',
            'when' => 'When',
            'series' => 'Series',
            'number' => 'Number',
            'address' => 'Address',
            'issued' => 'Issued',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'id']);
    }
}
