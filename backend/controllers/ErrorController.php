<?php

namespace backend\controllers;

class ErrorController extends \yii\web\Controller
{
    public $layout = 'error';

    /**
     * @inheritdoc
     * Mapping error page
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
}
