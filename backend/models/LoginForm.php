<?php
/**
 * LoginForm.php
 * Модель логина
 */

namespace backend\models;

use yii\base\Model;

class LoginForm extends Model
{
    /** @var string */
    public $login;

    /** @var string */
    public $password;

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required', 'message' => 'Поле не должно быть пустым'],
        ];
    }
}
