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

    </head>
    <body class="main-body">
        <?php $this->beginBody() ?>
        <header class="header main-container">
            <div class="logo">
                <a href="">tender.tours</a>
            </div>
            <div id="header-menu" class="header-menu glyphicon glyphicon-align-justify"></div>
            <?php if (Yii::$app->user->isGuest) { ?>
                <div class="log-reg">
                    <span id="log" class="account">Вход</span>
                    <span id="reg" class="account">Регистрация</span>
                </div>
            <?php } else { ?>
                <div class="log-reg">
                    Hello, <?= Yii::$app->session->get('user')->NAME ?>
                    <a href="/login/logout" id="logout" class="account">LOGOUT</a>
                </div>
            <?php } ?>
        </header>
        <div class="log-reg-form main-container">
            <ul class="log-reg-links col-xs-3">
                 <input type="button"  id="reg_tourist_btn" value="Турист"><br/>
                <input type="button"  id="reg_agent_btn" value="Агент"><br/>
<!--                <li id="reg_agent_btn" value="Агент" class="agent">Агент</li>
                <li id="reg_tourist_btn" value="Турист" class="tourist">Турист</li>-->
            </ul>
        </div>
        <div class="login-form-container main-container">
            <div class="login-form col-xs-3">
                <form action="">
                    <input type="text" placeholder="Логин"><br>
                    <input type="text" placeholder="Пароль"><br>
                    <button>Войти</button>
                </form>
            </div>
        </div>           
        <div id="registration" class="registration"></div>

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
            <div id="center-layer-head" class="center-layer-head">
                <div class="center-layer-text">Проект My Tender представляет собой платформу, на которой взаимодействуют две категории аудитории.</div>
                <a class="view-tenders" href="list.html">ПОСМОТРЕТЬ ТЕНДЕРА</a>
                <a class="view-tenders" id="publication" href="#">размесить тендер</a>
            </div>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>