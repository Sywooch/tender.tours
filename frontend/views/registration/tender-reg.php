<div id="tender-menu" class="tender-menu main-container row">
    <form method="post" id="tender-reg-form" name="tender-reg-form" action="/registration/tender">
        <input type="hidden" name="fromMain" />
        <div id="country" class="country col-xs-2">
            <p>Страна</p><br>
            <input name="country" class="input" type="text">
        </div>
        <div id="date" class="col-xs-2">
            <p>Дата</p><br>
            <input name="date-forw" type="text" id="datepicker1" placeholder="Дата заезда">
            <input name="date-back" type="text" id="datepicker2" placeholder="Дата выезда">
        </div>
        <div id="budjet" class="col-xs-2">
            <p>Бюджет</p><br>
            <input class="input" type="text">
        </div>
        <div id="stars" class="col-xs-2">
            <p>Звезд</p><br>
            <div id="reviewStars-input">
                <input value="1" id="star-4" type="radio" name="reviewStars"/>
                <label title="gorgeous" for="star-4"></label>

                <input value="2" id="star-3" type="radio" name="reviewStars"/>
                <label title="good" for="star-3"></label>

                <input value="3" id="star-2" type="radio" name="reviewStars"/>
                <label title="regular" for="star-2"></label>

                <input value="4" id="star-1" type="radio" name="reviewStars"/>
                <label title="poor" for="star-1"></label>

                <input value="5" id="star-0" type="radio" name="reviewStars"/>
                <label title="bad" for="star-0"></label>

            </div>
        </div>
        <div id="people" class="col-xs-2">
            <p>Людей</p><br>
            <div id="reviewMan-input">
                <input value="1" id="man-4" type="radio" name="reviewMan"/>
                <label title="gorgeous" for="man-4"></label>

                <input value="2" id="man-3" type="radio" name="reviewMan"/>
                <label title="good" for="man-3"></label>

                <input value="3" id="man-2" type="radio" name="reviewMan"/>
                <label title="regular" for="man-2"></label>

                <input value="4" id="man-1" type="radio" name="reviewMan"/>
                <label title="poor" for="man-1"></label>

                <input value="5" id="man-0" type="radio" name="reviewMan"/>
                <label title="bad" for="man-0"></label>
            </div>
        </div>
        
        
        <div class="col-xs-2 tender-menu-button-next">
            <button type="submit" id="next" class="next-button" name="tender-next">ДАЛЕЕ</a>
        </div>
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
    </form>
</div>