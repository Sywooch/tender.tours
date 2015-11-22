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



<a href="mytender.ru">Сайт</a>