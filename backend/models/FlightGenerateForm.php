<?php

namespace backend\models;

use yii\base\Model;

class FlightGenerateForm extends Model
{
    /**
     * @var
     */
    public $startDate;

    /**
     * @var
     */
    public $endDate;

    /**
     * @var int
     */
    public $idDriver;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [
                [
                    'startDate',
                    'endDate',
                    'idDriver'
                ],
                'required'
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'startDate' => 'Начальная дата',
            'endDate'   => 'Конечная дата',
            'idDriver'  => 'Водитель',
        ];
    }
}
