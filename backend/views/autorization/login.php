<?
use yii\helpers\Html;
?>

<div class="login-box">

    <div class="login-logo">
        <a href="#"><b>Автобусный</b> парк</a>
    </div>

    <div class="login-box-body">

        <? $form = \yii\widgets\ActiveForm::begin([
            'id'     => 'loginForm',
            'action' => '/autorization/login',
            'method' => 'post'
        ]) ?>

        <? if(!empty($error)): ?>
            <p class="login-box-msg text-danger"><?= $error ?></p>
        <? else: ?>
            <p class="login-box-msg">Введите логин и пароль</p>
        <? endif; ?>

            <?= $form->field($model, 'login',
                    [
                        'template' =>
                            '
                            {input}
                            {error}
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            ',
                        'options' => ['class' =>'has-feedback']
                    ]
                )
                ->label(false)
                ->textInput(['class' => 'form-control', 'placeholder' => 'Логин'])
                ->hint(false)
            ?>

            <?= $form->field($model, 'password',
                    [
                    'template' =>
                        '
                        {input}
                        {error}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        ',
                        'options' => ['class' =>'has-feedback']
                    ]
                )
                ->input('password')
                ->label(false)
                ->passwordInput(['class' => 'form-control', 'placeholder' => 'Пароль'])
                ->hint(false)
            ?>

            <div class="row">
                <div class="col-xs-4">
                    <?=  Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
            </div>

        <? \yii\widgets\ActiveForm::end() ?>

    </div>
</div>
