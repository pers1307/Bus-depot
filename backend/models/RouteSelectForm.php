<?php

namespace backend\models;

use yii\base\Model;

class RouteSelectForm extends Model
{
    /** @var int */
    public $id;

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id'], 'required', 'message' => 'Поле не должно быть пустым'],
        ];
    }
}
