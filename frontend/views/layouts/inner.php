<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

//BootstrapAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style-raiting.css">
    <link rel="stylesheet" href="/css/style-raiting-man.css">
    
    
    
</head>
<body>
<?php $this->beginBody() ?>
    
    
    <div class="container-fluid">
        <div class="row">
            <?= $content ?>
        </div>
    </div>
    
    <footer class="footer">

    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="/js/jquery-1.6.4.min.js"></script>
    <script src="/js/script.js"></script>
<?php $this->endBody() ?>
   
</body>
</html>
<?php $this->endPage() ?>