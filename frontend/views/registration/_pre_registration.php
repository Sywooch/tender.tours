<?php

use yii\helpers\Html;

// тернарный оператор if
$nameHasError = (/* if */ $model->hasErrors('name')) ? 'has-error' : /* else */ '';
$emailHasError = (/* if */ $model->hasErrors('email')) ? 'has-error' : /* else */ '';

?>

<div class="login">
    <h1>Регистрация</h1>
    <?php if ($model->hasErrors()) { ?>
    <div class="errors" style="color: red;">
        <?= Html::error($model, '_error') ?>
    </div>
    <?php } ?>
    <form method="post" action="/registration/PreRegistration" id="PreRegistrationForm" name="PreRegistrationForm">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

        <div class="form-group <?= $nameHasError ?> has-feedback">
            <input type="text" class="form-control"
                   id="name" name="name" placeholder="Ваше Имя"
                   value="<?= $model->name ?>" aria-describedby="name_error">
            <div id="name_error" class="help-block"><?= Html::error($model, 'name') ?></div>
        </div>
        
        <div class="form-group <?= $emailHasError ?> has-feedback">
            <input type="text" class="form-control"
                   id="email" name="email" placeholder="Email"
                   value="<?= $model->email ?>" aria-describedby="email_error">
            <div id="email_error" class="help-block"><?= Html::error($model, 'email') ?></div>
        </div
        <p class="submit"><input type="submit" value="Зарегистрироваться" /><p>
    </form>
</div>