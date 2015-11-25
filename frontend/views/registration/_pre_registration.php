<?php

use yii\helpers\Html;
?>

<div class="login registration-form">
    <h1>Регистрация</h1>
    <?php if (!empty($errorMessage)) { ?>
    <div class="errors">
        <?= $errorMessage ?>
        <?= Html::error($model, 'name') ?>
        <?= Html::error($model, 'email') ?>
    </div>
    <?php } ?>
    <form method="post" action="/registration/PreRegistration" id="PreRegistrationForm" name="PreRegistrationForm">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" /> 
        <p><input type="text" name="name" value="<?= $model->name ?>" placeholder="Ваше Имя"></p>
        <p><input type="text" name="email" value="<?= $model->email ?>" placeholder="Ваш Email"></p>
        <p class="submit"><input type="submit" value="Зарегистрироваться" /><p>
    </form>
</div>
<script type='text/javascript'>
$(document).on('submit', 'form#PreRegistrationForm', function(e) {
    e.preventDefault();
    $.ajax({
       url: '/registration/pre-registration',
       method: 'POST',
       data: $(this).serialize(),
       dataType: 'html',
       success: function(data) {
           console.log(data);
           $('#regist .registration-form').html(data);
       }
   });
});
</script>