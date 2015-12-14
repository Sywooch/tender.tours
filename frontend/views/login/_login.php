<?php namespace yii\helpers;

use yii\helpers\Url;
use Yii;

$nameHasError = (/* if */ $model->hasErrors('username')) ? 'has-error' : /* else */ '';
$emailHasError = (/* if */ $model->hasErrors('password')) ? 'has-error' : /* else */ '';

?>


<div class="login">
    <h1>Войти в личный кабинет</h1>
    <form method="post" action="/login" name="LoginForm" id="LoginForm">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        
        <div class="form-group <?= $nameHasError ?> has-feedback">
            <input type="text" class="form-control"
                   id="username" name="username" placeholder="Логин или Email"
                   value="<?= $model->username ?>" aria-describedby="username_error">
            <div id="username_error" class="help-block"><?= Html::error($model, 'username') ?></div>
        </div>
        
        <div class="form-group <?= $emailHasError ?> has-feedback">
            <input type="password" class="form-control"
                   id="password" name="password" placeholder="Пароль"
                   value="<?= $model->password ?>" aria-describedby="password_error">
            <div id="email_error" class="help-block"><?= Html::error($model, 'password') ?></div>
        </div>
        <p class="submit"><input type="submit" value="Войти"></p>
        
    </form>
</div>