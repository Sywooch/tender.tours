<?php namespace yii\helpers;

use yii\helpers\Url;
use Yii;

 ?>


<form action="<?= Url::toRoute(['login/']) ?>" name="LoginForm" method="POST" class="login-form">
        <input type="text" id="email" name="username" placeholder="Email">
        <input type="password" id="password" name="password" placeholder="Пароль">
        <button type="submit">Отправить</button>
</form>
        
<?= print_r(Yii::$app->user);?>