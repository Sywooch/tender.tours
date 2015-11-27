<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

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
        
        <link rel="stylesheet" href="css/calendar-ui.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <link href="css/jquery.rating.css" rel="stylesheet" type="text/css" /> 
        
    </head>
    <body class="main-body">
        <?php $this->beginBody() ?>
        
        <header class="header main-container">
            <div id="header-menu" class="header-menu glyphicon glyphicon-align-justify">
                <div id="menu" class="modal-menu">
                    <div class="col-lg-4">
                        <div class="nav">
                            <ul>
                                <li><a href="#">asfsaff</a></li>
                                <li><a href="#">asfsaff</a></li>
                                <li><a href="#">asfsaff</a></li>
                                <li><a href="#">asfsaff</a></li>
                                <li><a href="#">asfsaff</a></li>
                                <li><a href="#">asfsaff</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="log-reg">
                <span id="log" class="account">LOGIN</span>
                <span id="reg" class="account">REGISTRATION</span>
            </div>
            <div id="login" class="modal-window">
                <div class="modal-close glyphicon glyphicon-remove"></div>
                <section class="container">
                    <div class="login login-form"></div>
                </section>
            </div>
            <div id="regist" class="modal-window">
                <div class="modal-close glyphicon glyphicon-remove"></div>
                <section class="container">
                    <div class="login registration-form"></div>
                </section>
            </div>
            <div id="overlay"></div>
        </header>

        <div id="center-layer" class="center-layer">
            <div class="center-layer-head">
                <div class="center-layer-title">MY TENDER</div>
                <div class="center-layer-text">Проект My Tender представляет собой платформу, на которой взаимодействуют две категории аудитории.</div>
                <a class="view-tenders" href="#">ПОСМОТРЕТЬ ТЕНДЕРА</a>
            </div>
            <div id="publication" class="publication-link">
                ПУБЛИКАЦИЯ ТЕНДЕРА
                <div class="glyphicon glyphicon-arrow-down"></div>
            </div>
        </div>   

        <div id="tender-menu" class="tender-menu main-container row">
            <div id="country" class="col-xs-2">
                <p>Страна</p><br>
                <input class="input" type="text">
            </div>
            <div id="date" class="col-xs-2">
                <p>Дата</p><br>
                <input type="text" id="datepicker1" placeholder="Дата заезда"><br>
                <input type="text" id="datepicker2" placeholder="Дата выезда">
            </div>
            <div id="budjet" class="col-xs-2">
                <p>Бюджет</p><br>
                <input class="input" type="text"> $
            </div>
            <div id="stars" class="col-xs-2">
                <p>Звезд</p><br>
                <div id="rating_1">
                    <input type="hidden" name="vote-id" value="1"/>
                </div>
            </div>
            <div id="people" class="col-xs-2">
                <p>Людей</p><br>
                <div id="rating_2">
                    <input type="hidden" name="vote-id" value="1"/>
                </div>
            </div>
            <div class="col-xs-2 tender-menu-button-next">
                <a id="next" class="next-button" href="#">ДАЛЕЕ</a>
            </div>
        </div>

        <?php $this->endBody() ?>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.rating-2.0.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
<?php $this->endPage() ?>