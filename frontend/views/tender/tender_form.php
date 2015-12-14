<?php

use yii\helpers\Html;
?>


<?= Html::errorSummary($model, ['class' => 'errors', 'style' => 'color: red;']) ?>

<form autocomplete="off" name="TenderForm" id="form-registration-tender" action="/tender/registrate">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
    <p>Регистрация</p>
    <input type="text" name="country_from" placeholder="Страна откуда"><i class="fa fa-check fa-lg"></i><br>

    <input type="text" name="email" placeholder="Горд откуда"><i class="fa fa-check fa-lg"></i><br>

    <input type="text" name="country_to"  placeholder="Страна куда"><i class="fa fa-check fa-lg"></i><br>

    <input type="text" name="city_to"  placeholder="Город куда"><i class="fa fa-check fa-lg"></i><br>

    <input type="text" name="date_forward" id="datepicker1" placeholder="Дата заезда">
    <div id="checked-input" class="checked-input-date-to">
        <span>Любое</span>
        <input id="check-1" type="checkbox" name="checked"/>
        <label title="gorgeous" for="check-1"></label>
    </div>

    <input type="text" name="date_back" id="datepicker2" placeholder="Дата выезда">
    <div id="checked-input" class="checked-input-date-from">
        <span>Любое</span>
        <input id="check-2" type="checkbox" name="checked"/>
        <label title="gorgeous" for="check-2"></label>
    </div>

    <div id="reviewStars-input">
        <div class="title-raiting">Звезды:</div>
        
        <?php
        for ($i = 4; $i >= 0; $i--) {
//            $starChecked = ($i == $tender->stars) ? 'checked="checked"' : '';
            ?>
            <input value="<?= $i ?>" id="star-<?= $i ?>" type="radio" name="stars" />
            <label title="gorgeous" for="star-<?= $i ?>"></label>
        <?php } ?>
<!--        <input id="star-4" type="radio" name="reviewStars"/>
        <label title="gorgeous" for="star-4"></label>

        <input id="star-3" type="radio" name="reviewStars"/>
        <label title="good" for="star-3"></label>

        <input id="star-2" type="radio" name="reviewStars"/>
        <label title="regular" for="star-2"></label>

        <input id="star-1" type="radio" name="reviewStars"/>
        <label title="poor" for="star-1"></label>

        <input id="star-0" type="radio" name="reviewStars"/>
        <label title="bad" for="star-0"></label>  -->
    </div>
    <div id="checked-input" class="checked-input-stars">
        <span>Любое</span>
        <input id="check-3" type="checkbox" name="checked"/>
        <label title="gorgeous" for="check-3"></label>
    </div>

    <div id="reviewMan-input">
        <div class="title-raiting">Людей:</div>
        <?php
        for ($i = 4; $i >= 0; $i--) {
//            $manChecked = ($i == $tender->people_sum) ? 'checked="checked"' : '';
            ?>
            <input value="<?= $i ?>" id="man-<?= $i ?>" type="radio" name="people_sum" />
            <label title="gorgeous" for="man-<?= $i ?>"></label>
        <?php } ?>
<!--        <input id="man-4" type="radio" name="reviewMan"/>
        <label title="gorgeous" for="man-4"></label>

        <input id="man-3" type="radio" name="reviewMan"/>
        <label title="good" for="man-3"></label>

        <input id="man-2" type="radio" name="reviewMan"/>
        <label title="regular" for="man-2"></label>

        <input id="man-1" type="radio" name="reviewMan"/>
        <label title="poor" for="man-1"></label>

        <input id="man-0" type="radio" name="reviewMan"/>
        <label title="bad" for="man-0"></label>-->
    </div>

    <input type="text" name="budget"  placeholder="бюджет"><i class="fa fa-check fa-lg"></i><br>

    <input type="text" name="feed"  placeholder="Питание"><i class="fa fa-check fa-lg"></i><br>

    <input type="text" name="transport"  placeholder="Транспорт"><i class="fa fa-check fa-lg"></i><br>

    <input id="next-step-2-registration reg_tender_btn" type="submit" value="Продолжить">
</form>