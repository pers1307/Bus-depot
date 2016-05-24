<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$code = $exception->getCode();

if ((int)$code === 0) {
    $this->title = $exception->statusCode;
} else {
    $this->title = $code;
}
?>

<div class="left">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<div class="right">
    <h3>Ошибка!</h3>
    <h4><?= nl2br(Html::encode($message)) ?></h4>
    <a href="/">Вернуться</a>
</div>
<div class="clear"></div>