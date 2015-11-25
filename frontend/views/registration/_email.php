<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h2>Поздравляем  !!!</h2>

<br/>
<b><?= $model->name ?></b>
<br/>
<p>Ваш логин: <?= $model->email ?></p>
<p>Пароль: <?= $model->getPassword() ?></p>
<p>Для подтверждения e-mail и продолжения регистрации перейдите по ссылке:
    <?= $model->conflink; ?></p>



<a href="tender.tours">Сайт</a>