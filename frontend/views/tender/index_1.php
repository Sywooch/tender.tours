<?php

use yii\helpers\Html;

$this->title = 'Публикация тендера';


?>

<div class="col-lg-10  col-sm-10 col-md-2 col-xs-7">
    <div class="row">

        <form class="form-horizontal" role="form">
            <div class="form-group">

                <div class="bubl-name">
                    <h2 class="registr-tittle"><?= Html::encode($this->title) ?></h2>
                </div>

                <label for="header" class="col-sm-3 control-label">Заголовок:</label>
                <input type="text" class="form-control-tender" id="header" placeholder="Заголовок">
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Имя:</label>
                <input type="text" class="form-control-tender" id="name" placeholder="Имя">
            </div>

            <div class="form-group">
                <label for="country" class="col-sm-3 control-label">Страна:</label>
                <input type="text" class="form-control-tender" id="country" placeholder="Страна">
            </div> 
            <div class="form-group">
                <label for="city" class="col-sm-3 control-label">Город:</label>
                <input type="text" class="form-control-tender" id="city" placeholder="Город">
            </div> 

            <div class="form-group">
                <label for="firstdate" class="col-sm-3 control-label">Дата вылета:</label>
                <input type="date" class="form-control-tender" id="firstdate">
                <label>
                    <input type="checkbox" value="">
                    Не важно
                </label>
            </div>

            <div class="form-group">
                <label for="lastdate" class="col-sm-3 control-label">Дата приезда:</label>      
                <input type="date" class="form-control-tender" id="lastdate">
                <label>
                    <input   type="checkbox" value="">
                    Не важно
                </label>           
            </div>	
            <div class="form-group">
                <label class="col-sm-3 control-label">Количество звезд:</label>
                <label class="checkbox-inline">
                    <input  type="checkbox" id="inlineCheckbox1" value="option1"> 1
                </label>
                <label class="checkbox-inline">
                    <input  type="checkbox" id="inlineCheckbox2" value="option2"> 2
                </label>
                <label class="checkbox-inline">
                    <input   type="checkbox" id="inlineCheckbox3" value="option3"> 3
                </label>
                <label class="checkbox-inline">
                    <input   type="checkbox" id="inlineCheckbox3" value="option3"> 4
                </label>
                <label class="checkbox-inline">
                    <input  type="checkbox" id="inlineCheckbox3" value="option3"> 5
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="option3"> минимальная стоимость
                </label>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Транспорт:</label>
                <select class="form-control-tender">
                    <option selected value="Выберите транспорт">Выберите транспорт</option>
                    <option value="Самолет">Самолет</option>
                    <option value="Автобус">Автобус</option>
                    <option value="Поезд">Поезд</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Питание:</label>
                <select class="form-control-tender"> 
                    <option value="1 раз">1 раз</option>
                    <option value="2 раза">2 раза</option>
                    <option value="3 раза">3 раза</option>
                </select>
            </div>


            <div class="form-group">
                <label for="budget" class="col-sm-3 control-label">Бюджет:</label>
                <input type="text" class="form-control-tender" id="budget" placeholder="Бюджет">
            </div>

            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Телефон:</label>
                <input type="tel" class="form-control-tender" id="tel" placeholder="Телефон">
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-3 control-label">Email:</label>
                <input type="email" class="form-control-tender" id="Email" placeholder="Email">
            </div> 
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Пароль:</label>
                <input type="password" class="form-control-tender" id="password" placeholder="Пароль">
            </div>

            <div class="form-group">
                <label for="repeat-password" class="col-sm-3 control-label">Подтверждение пароля:</label>
                <input type="password" class="form-control-tender" id="repeat-password" placeholder="Подтверждение пароля">
            </div> 

            <div class="tenderbutton">
                <button type="button" class="btn btn-default">Опубликовать тендер</button>
            </div>
        </form>
    </div>
</div>