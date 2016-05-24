<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$code = $exception->getCode();

if ((int)$code === 0) {
    $this->title = $exception->statusCode;
} else {
    $this->title = $code;
}
?>

<div class="main">
    <h3>Автобусный парк</h3>
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= nl2br(Html::encode($message)) ?></p>
    <br>
    <br>
    <br>
</div>