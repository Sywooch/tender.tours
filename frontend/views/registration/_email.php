<?php
use yii\helpers\Url;

?>

<h2>Поздравляем!!!</h2>

<br/>
<b><?= $model->name ?></b>
<br/>
<p>Ваш логин: <?= $model->email ?></p>
<p>Пароль: <?= $password ?></p>





<a href="http://mytender.com/<?= $registrationToken ?>">Завершить регистрацию</a>