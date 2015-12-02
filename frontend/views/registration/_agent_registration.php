<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->layout = 'inner';
$this->title = 'Регистрация турагента';


?>


<h2>Регистрация турагента</h2>


<form class="form-horizontal" action="<?= Url::current()?>" role="form" name="RegForm" method="POST">
  <div class="form-group">
    <label for="Company-name" class="col-sm-4 control-label">Название компании: </label>
      <input type="text" class="form-control-registration" name="company" placeholder="Название вашей компании"
             value="<?= $model->company ?>">
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-4 control-label">Имя:</label>
      <input type="text" class="form-control-registration" name="username" placeholder="Имя">
  </div>
 
  <div class="form-group">
     <label for="tel" class="col-sm-4 control-label">Телефон:</label>
          <input type="tel" class="form-control-registration" id="tel" placeholder="Телефон">
			 </div> 
  <div class="form-group">
     <label for="address" class="col-sm-4 control-label">Фактический адрес:</label>
          <input type="text" class="form-control-registration" id="address" placeholder="Фактический адрес">
			 </div> 
	  
   <div class="form-group">
     <label for="Legal-address" class="col-sm-4 control-label">Юридический адрес:</label>
          <input type="text" class="form-control-registration" id="Legal address" placeholder="Юридический адрес">
            </div>
             	  
   <div class="form-group">
     <label for="license-number" class="col-sm-4 control-label">Код ЕГРПОУ:</label>      
          <input type="text" class="form-control-registration" id="license-number">
              </div>	
    <div class="form-group">
      <label for="Email" class="col-sm-4 control-label">Email:</label>
          <input type="email" class="form-control-registration" id="Email" placeholder="Email">
              </div> 
			  
			  
            <div class="registr-bt">
                <button type="submit" class="btn btn-default">Зарегистрироваться</button>
		  </div>
		  

</form>

