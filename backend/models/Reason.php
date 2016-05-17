<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reason".
 *
 * @property string $id
 * @property string $name
 */
class Reason extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reason';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Инентификатор',
            'name' => 'Название',
        ];
    }
}
