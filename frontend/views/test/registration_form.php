<?php

use yii\helpers\Html;
?>


    <i id="registration-close" class="fa fa-times fa-2x"></i>
    <div class="main-container row">
        <div class="form-registration">
            <?= Html::errorSummary($model, ['class' => 'errors', 'style' => 'color: red;']) ?>
            <form name="TestRegistrationForm" action="/test/registration" autocomplete="off">
                <p>Регистрация</p>
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                <input type="hidden" name="type" value="<?= $model->type ?>" />

                <input type="text" name="name" value="<?= $model->name ?>"  placeholder="Ваше имя"><i id="fa-name" class="fa fa-check fa-lg"></i><br>

                <input id="email" type="text" name="email" value="<?= $model->email ?>" placeholder="Ваш Email"><i id="fa-email" class="fa fa-check fa-lg"></i><br>

                <input type="text" name="phone" value="<?= $model->phone ?>" placeholder="Ваш телефон"><i id="fa-phone" class="fa fa-check fa-lg"></i><br>

                <input type="submit" value="Зарегистрироваться">
            </form>
        </div>
    </div>
