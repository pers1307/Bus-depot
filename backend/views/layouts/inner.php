<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\InnerAsset;

InnerAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <base href="/">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <?= $this->render('//cabinet/common/header') ?>

    <?= $this->render('//cabinet/common/sidebar') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Контрольная панель</small>
            </h1>
        </section>

        <?= $content ?>
    </div>

    <?= $this->render('//cabinet/common/footer') ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>