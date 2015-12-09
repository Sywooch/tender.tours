<body><div class="registration-form-background"></div>
    <div class="form-registration">
        <div class="col-xs-12 title-registration">
            Выберите свой тип регистрации
        </div>     
        <div id="registration-tourist" class="col-xs-6 registration registration-tourist">
            <p class="tourist button-registration"><input id="button-tourist" type="button" name="agent" value="Турист"></p>
        </div>
        <div id="registration-agent" class="col-xs-6  registration registration-agent">
            <p class="agent button-registration"><input id="button-agent" type="button" name="tourist" value="Агент"></p>
        </div>
    </div>
    <div class="form-registration-transition main-container row">
        <div id="form-registration-tourist" class="form-registration-tourist col-xs-6">
            <div id="close-tourist"><i class="close-registration fa fa-times fa-2x"></i></div>
            <form action="/registration/reg-confirm/?id=<?= $user->REGISTRATION_TOKEN ?>">
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
            <div id="close-agent"><i class="close-registration fa fa-times fa-2x"></i></div>
             <form action="/registration/reg-confirm/?id=<?= $user->REGISTRATION_TOKEN ?>">
                <div class="registration-agent col-xs-12">
                    <div class="row-xs-12">
                        <h2>Регистрация турагента</h2>
                        <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <label  class="col-xs-12 control-label">Название компании: </label><br>
                              <input type="text" name="company" class="form-control-registration" placeholder="Название компании">
                          </div>
                          <div class="form-group">
                            <label  class="col-xs-12 control-label">Телефон: </label><br>
                              <input type="text" name="phone" class="form-control-registration"  placeholder="Номер телеона">
                          </div>
                          <div class="form-group">
                            <label  class="col-xs-12 control-label">Фактический адрес: </label><br>
                              <input type="text" name="faddress" class="form-control-registration" placeholder="Фактический адрес">
                          </div>
                          <div class="form-group">
                            <label  class="col-xs-12 control-label">Юридический адрес: </label><br>
                              <input type="text" name="jaddress" class="form-control-registration" placeholder="Юридический адрес">
                          </div>
                           <div class="form-group">
                            <label  class="col-xs-12 control-label">Код ЕГРПОУ: </label><br>
                              <input type="text" name="edrpou" class="form-control-registration" placeholder="Код ЕГРПОУ:">
                          </div>
                          <div class="form-group">
                            <label  class="col-xs-12 control-label">Прикрепите скан ЕДРПОУ: </label><br>
                              <input type="file" name="edrpouscan" id="edrpouscan">
                          </div>
                          <button type="submit" name="agent-submit">Зарегистрироватся</button>
                          <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</body>
