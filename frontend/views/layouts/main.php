<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
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
        
        <link rel="stylesheet" href="/css/calendar-ui.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/style-raiting.css">
        <link rel="stylesheet" href="/css/style-raiting-man.css">

        <link href="/css/jquery.rating.css" rel="stylesheet" type="text/css" /> 
        
    </head>
    <body class="main-body">
        <?php $this->beginBody() ?>
        <header class="header main-container">
            <div class="logo"><a href="">My tender</a></div>
            <div id="header-menu" class="header-menu glyphicon glyphicon-align-justify">
                
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
                    <div class="login registration-form">
                    </div>
                </section>
            </div>
            <div id="overlay"></div>
        </header>
        
        <div id="menu" class="modal-menu">
        <div class="content-menu main-container">
            <div id="navigation-menu" class="navigation-menu col-xs-6">
                <nav class="navigation">
                    <ul>
                        <li><a href="#">туристам</a></li>
                        <li><a href="#">турагентам</a></li>
                        <li><a href="#">просмотреть тендера</a></li>
                        <li><a href="#">тарифы</a></li>
                        <li><a href="#">о сервисе</a></li>
                    </ul>
                </nav>
            </div>

            <div id="contacts-menu" class="contacts-menu col-xs-6">                        
                <div class="contacts">
                    <div class="hot-line-number"><p>050 837 39 53<br><span>Горячая линия</span></p></div>
                    <div class="button-zvonok"><a id="zvonok" class="zvonok" href="#">Заказать звонок</a></div>
                    <p><input type="text" name="client-number" value="" placeholder="Введите номер"></p>
                    <div class="button-send"><a id="send" class="sebd" href="#">Отправить</a></div>
                </div>
            </div>

            <div id="social" class=" social col-xs-12">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-vk fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <div id="center-layer" class="center-layer">
            <div class="center-layer-head">
                <div class="center-layer-title">MY TENDER</div>
                <div class="center-layer-text">Проект My Tender представляет собой платформу, на которой взаимодействуют две категории аудитории.</div>
                <a class="view-tenders" href="/tender/list">ПОСМОТРЕТЬ ТЕНДЕРА</a>
            </div>
            <div id="publication" class="publication-link">
                ПУБЛИКАЦИЯ ТЕНДЕРА
                <div class="glyphicon glyphicon-arrow-down"></div>
            </div>
        </div>   

        <div id="tender-menu" class="tender-menu main-container row">
        <div id="country" class="country col-xs-2">
            <p>Страна</p><br>
            <input class="input" type="text">
        </div>
        <div id="date" class="col-xs-2">
            <p>Дата</p><br>
            <input type="text" id="datepicker1" placeholder="Дата заезда">
            <input type="text" id="datepicker2" placeholder="Дата выезда">
        </div>
        <div id="budjet" class="col-xs-2">
            <p>Бюджет</p><br>
            <input class="input" type="text">
        </div>
        <div id="stars" class="col-xs-2">
            <p>Звезд</p><br>
            <div id="reviewStars-input">
                <input id="star-4" type="radio" name="reviewStars"/>
                <label title="gorgeous" for="star-4"></label>

                <input id="star-3" type="radio" name="reviewStars"/>
                <label title="good" for="star-3"></label>

                <input id="star-2" type="radio" name="reviewStars"/>
                <label title="regular" for="star-2"></label>

                <input id="star-1" type="radio" name="reviewStars"/>
                <label title="poor" for="star-1"></label>

                <input id="star-0" type="radio" name="reviewStars"/>
                <label title="bad" for="star-0"></label>

            </div>
        </div>
        <div id="people" class="col-xs-2">
            <p>Людей</p><br>
            <div id="reviewMan-input">
                <input id="man-4" type="radio" name="reviewMan"/>
                <label title="gorgeous" for="man-4"></label>

                <input id="man-3" type="radio" name="reviewMan"/>
                <label title="good" for="man-3"></label>

                <input id="man-2" type="radio" name="reviewMan"/>
                <label title="regular" for="man-2"></label>

                <input id="man-1" type="radio" name="reviewMan"/>
                <label title="poor" for="man-1"></label>

                <input id="man-0" type="radio" name="reviewMan"/>
                <label title="bad" for="man-0"></label>
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