<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\BootstrapAsset;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
    </head>
    <body class="main-body">
        <?php $this->beginBody() ?>
        <div class="container all-text">
            <div class="row">
                <div class="col-md-12 title-top-block">
                    <div class="registr-btn-group">
                        <?php if (Yii::$app->user->isGuest) { ?>
                            <div class="dropdown registr-bt-1">
                                <a class="registr-bt-text" data-toggle="dropdown" href="#">Вход</a>
                                <?= $this->render('/_partial/_login') ?>
                            </div>
                        <?php } else { ?>
                            <div class="dropdown registr-bt-1">
                                <a class="registr-bt-text" href="<?= Url::to('login/logout') ?>">Выход</a>
                            </div>
                        <?php } ?>


                        <div class="dropdown registr-bt-2">
                            <a class="registr-bt-text" data-toggle="dropdown" href="#">Регистрация</a>
                            <ul class="dropdown-menu registr-bt-menu-styles2" role="menu" aria-labelledby="dLabel">
                                <li><a class="registration-man" href="<?= Url::toRoute(['registration/', 'type' => 'tourist']) ?>" target="_blank">турист</a></li>
                                <li><a class="registration-man" href="<?= Url::toRoute(['registration/', 'type' => 'agent']) ?>" target="_blank">турагент</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 logo-icon-block">
                    <div class="logo-icon">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 logo-info-block">
                    <div class="internal-logo-block">
                        <div class="logo-name">
                            My tender
                        </div>
                        <div class="info-under-logo">
                            информация  информация  информация 
                        </div>
                    </div>
                </div>
            </div>



            <div class="row title-main-block">
                <div class="internal-title-main-block">
                    <div class="col-md-2 title-blocks">
                        <div class="main-block-content">
                            <div class="main-block-name">
                                Тематика
                            </div>
                            <div class="main-block-info">
                                <span class="glyphicon glyphicon-file"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 title-blocks">
                        <div class="main-block-content">
                            <div class="main-block-name">
                                Бюджет поездки
                            </div>
                            <div class="main-block-info">
                                <span class="glyphicon glyphicon-usd"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 title-blocks">
                        <div class="main-block-content">
                            <div class="main-block-name">
                                Количесвто звезд
                            </div>
                            <div class="main-block-info">
                                <span class="glyphicon glyphicon-star"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 title-blocks">
                        <div class="main-block-content">
                            <div class="main-block-name">
                                Период поездки
                            </div>
                            <div class="main-block-info">
                                <span class="glyphicon glyphicon-time"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 title-blocks">
                        <div class="main-block-content">
                            <div class="main-block-name">
                                Детали
                            </div>
                            <div class="main-block-info">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-tender-btn-block"><a class="main-tender-btn-block-link" href="tender.html" target="_blank">
                            <div class="main-tender-btn-name">
                                Разместить тендер
                            </div>
                            <div class="search-icon"><span class="glyphicon glyphicon-search"></span></div></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 main-view-tender-block">
                    <div class="main-view-tender-inside-block">
                        <div class="or">
                            или
                        </div>
                        <div class="view-tender-bt"><a class="view-tender-bt-link" href="tourist_cab2.html" target="_blank">
                                <div class="view-tender-bt-text">просмотреть тендера</div>
                                <div class="spinning-icon"><span class="glyphicon glyphicon-refresh"></span></div></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>