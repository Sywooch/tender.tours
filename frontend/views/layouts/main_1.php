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
        <link rel="stylesheet" href="/css/checkbox.css">
        

    </head>
    <body class="main-body">
        <?php $this->beginBody() ?>
        <header class="header main-container">
            <div class="logo"><a href="">My tender</a></div>
            <div id="header-menu" class="header-menu glyphicon glyphicon-align-justify">

            </div>
            <?php if (Yii::$app->user->isGuest) { ?>
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
            <?php } else { ?>
            <div class="log-reg">
                Hello, <?= Yii::$app->session->get('user')->NAME ?>
                <a href="/login/logout" id="logout" class="account">LOGOUT</a>
            </div>
            <?php } ?>
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
    <form method="post" id="tender-reg-form" name="tender-reg-form" action="/registration/tender">
        <input type="hidden" name="fromMain" />
        <div id="country" class="country col-xs-2">
            <p>Страна</p><br>
            <select name="country" class="input" type="text">
                <option>USA</option>
                <option>fghknmyuk</option>
            </select>
        </div>
        <div id="date" class="col-xs-2">
            <p>Дата</p><br>
            <input name="date_forward" type="text" id="datepicker1" placeholder="Дата заезда">
            <input name="date_back" type="text" id="datepicker2" placeholder="Дата выезда">
        </div>
        <div id="budget" class="col-xs-2">
            <p>Бюджет</p><br>
            <input class="input" type="text" name="budget">
        </div>
        <div id="stars" class="col-xs-2">
            <p>Звезд</p><br>
            <div id="stars_sum">
                <?php
                for ($i = 4; $i >= 0; $i--) { ?>
                    <input value="<?= $i ?>" id="star-<?= $i ?>" type="radio" name="stars"/>
                    <label title="gorgeous" for="star-<?= $i ?>"></label>
                <?php } ?>
            </div>
        </div>
        <div id="people" class="col-xs-2">
            <p>Людей</p><br>
            <div id="people_sum">
                <?php
                for ($i = 4; $i >= 0; $i--) { ?>
                    <input value="<?= $i ?>" id="man-<?= $i ?>" type="radio" name="people_sum"/>
                    <label title="gorgeous" for="man-<?= $i ?>"></label>
                <?php } ?>
            </div>
        </div>        
        
        <div class="col-xs-2 tender-menu-button-next">
            <button type="submit" id="next" class="next-button" name="tender-next">ДАЛЕЕ</a>
        </div>
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
    </form>
</div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>