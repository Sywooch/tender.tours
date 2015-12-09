<?php

use yii\helpers\Html;
?>

<?php if ($tender->hasErrors()) { ?>
    <div class="errors" style="color: red;">
        <?= Html::error($tender, '_error') ?>
    </div>
<?php } ?>
<?php if ($user->hasErrors()) { ?>
    <div class="errors" style="color: red;">
        <?= Html::error($user, '_error') ?>
    </div>
<?php } ?>
<div>
    <form method="post" id="tourist-tender" name="tourist-tender" action="/registration/tender">
        <div id="country" class="country col-xs-2">
            <p>Страна</p><br>
            <select name="country" class="input" type="text" value="<?= $tender->country ?>">
                <option>USA</option>
                <option>fghknmyuk</option>
            </select>
        </div>
        <div id="date" class="col-xs-2">
            <p>Дата</p><br>
            <input name="date_forward" type="text" id="datepicker1" placeholder="Въезд" value="<?= $tender->date_forward ?>">
            <input name="date_back" type="text" id="datepicker2" placeholder="Выезд" value="<?= $tender->date_back ?>">
        </div>
        <div id="budget" class="col-xs-2">
            <p>Бюджет</p><br>
            <input class="input" name="budget" type="text" value="<?= $tender->budget ?>">
        </div>
        <div id="stars" class="col-xs-2">
            <p>Звезд</p><br>
            <div id="stars_sum">
                <?php
                for ($i = 4; $i >= 0; $i--) {
                    $starChecked = ($i == $tender->stars) ? 'checked="checked"' : '';
                    ?>
                    <input value="<?= $i ?>" id="star-<?= $i ?>" type="radio" name="stars" <?= $starChecked ?>/>
                    <label title="gorgeous" for="star-<?= $i ?>"></label>
                <?php } ?>
            </div>
        </div>
        <div id="people" class="col-xs-2">
            <p>Людей</p><br>
            <div id="people_sum">
                <?php
                for ($i = 4; $i >= 0; $i--) {
                    $manChecked = ($i == $tender->people_sum) ? 'checked="checked"' : '';
                    ?>
                    <input value="<?= $i ?>" id="man-<?= $i ?>" type="radio" name="people_sum" <?= $manChecked ?>/>
                    <label title="gorgeous" for="man-<?= $i ?>"></label>
                <?php } ?>
            </div>
        </div>

        <input type="text" name="header" id="theader" placeholder="Заголовок тендера">
        <input type="text" name="city" id="city" placeholder="Город">
        <input type="text" name="transport" id="transport" placeholder="Тип транспорта">
        <input type="text" name="feed" id="feed" placeholder="Питание">
        Заполните контактные данные
        <input type="text" class="form-control" id="name" name="name"
               placeholder="Ваше Имя" value="<?= $user->name ?>" aria-describedby="name_error">
        <input type="text" class="form-control" id="email" name="email"
               placeholder="Email" value="<?= $user->email ?>" aria-describedby="email_error">    
        Введите свой номер телефона для получения смс-подтверждения:<br>
        <input type="text" name="phone" id="phone-number-tourist" placeholder="Номер телефона"><br>

        <div class="col-xs-2 tender-menu-button-next">
            <button type="submit" id="next" class="next-button" name="tender-next">ОТПРАВИТЬ</a>
        </div>
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
    </form>
</div>