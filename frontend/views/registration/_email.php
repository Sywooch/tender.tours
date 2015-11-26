<?php

?>

<h2>Поздравляем!!!</h2>

<br/>
<b><?= $model->name ?></b>
<br/>
<p>Ваш логин: <?= $model->email ?></p>
<p>Пароль: <?= $password ?></p>





<a href="<?= Yii::$app->homeUrl ?>/registration/confirm/<?= $registrationToken ?>">Завершить регистрацию</a>