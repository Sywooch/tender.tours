<body>  
    <div class="registration-form main-container row">
        <div class="col-xs-12 title-registration">
            Выберите свой тип регистрации
        </div>     
        <div id="registration-tourist" class="col-xs-6 registration registration-tourist">
            <p class="tourist button-registration"><input id="button-tourist" type="button" name="agent" value="Турист"></p>
        </div>
        <div id="registration-agent" class="col-xs-6 registration registration-agent">
            <p class="agent button-registration"><input id="button-agent" type="button" name="tourist" value="Агент"></p>
        </div>
    </div>
    <div class="form-registration-transition main-container row">
        <div id="form-registration-tourist" class="form-registration-tourist col-xs-6 row">
            <div id="close-agent"><i class="close-registration fa fa-times fa-lg"></i></div>

            <form method="post" id="reg-confirm-form" name="reg-confirm-form" action="/registration/reg-confirm/?id=<?= $user->REGISTRATION_TOKEN ?>">
                <div class="send-number-tourist col-xs-12">
                    <input type="hidden" name="type" value="tourist">
                    Введите свой номер телефона для получения смс-подтверждения:<br>
                    <input type="text" name="phone" id="phone-number-tourist" placeholder="Номер телефона"><br>
                    <button type="submit" name="tourist-submit">Отправить</button>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                </div>
            </form>

        </div>
        <div id="form-registration-agent" class="form-registration-agent col-xs-6">
            <div id="close-agent"><i class="close-registration fa fa-times fa-lg"></i></div>
            
            <form method="post" id="reg-confirm-form" name="reg-confirm-form" action="/registration/reg-confirm/?id=<?= $user->REGISTRATION_TOKEN ?>">                
                <div class="send-number-tourist col-xs-12">
                    <input type="hidden" name="type" value="agent">
                    Введите свой номер телефона для получения смс-подтверждения:<br>
                    <input type="text" name="company" id="company" placeholder="Название компании"><br>
                    <input type="text" name="phone" id="phone-number-agent" placeholder="Номер телефона"><br>
                    <input type="text" name="faddress" id="faddress" placeholder="Физический адрес"><br>
                    <input type="text" name="jaddress" id="jaddress" placeholder="Юридический адрес"><br>
                    <input type="text" name="edrpou" id="edrpou" placeholder="Код ЕДРПОУ"><br>
                    <input type="file" name="edrpouscan" id="edrpouscan">
                    <button type="submit" name="tourist-submit">Отправить</button>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                </div>
            </form>
            
        </div>
    </div>
</body>