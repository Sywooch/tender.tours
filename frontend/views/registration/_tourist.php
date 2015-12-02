<?php namespace yii\helpers;

use yii\helpers\Url;
use Yii;

$nameHasError = (/* if */ $model->hasErrors('PHONE')) ? 'has-error' : /* else */ '';

?>


<div class="login registration-form">
    <h1>Подтверждение телефонного номера</h1>
    <form method="post" action="tourist" name="TouristRegForm" id="login">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>" />
        
        <div class="form-group <?= $nameHasError ?> has-feedback">
            <input type="text" class="form-control"
                   id="username" name="PHONE" placeholder="Номер телефона"
                   value="<?= $model->phone ?>" aria-describedby="PHONE_error">
            <div id="username_error" class="help-block"><?= Html::error($model, 'PHONE') ?></div>
        </div>
       
        <p class="submit"><input type="submit" value="Отправить"></p>
        
    </form>
</div>
<!--script type='text/javascript'>
$(document).on('submit', 'form#LoginForm', function(e) {
    e.preventDefault();
    $.ajax({
       url: '/login/index',
       method: 'POST',
       data: $(this).serialize(),
       dataType: 'html',
       success: function(data) {
           $('#login .login-form').html(data);
       },
       statusCode: {
           302: function() {
               window.location.href = '/';
           }
       }
   });
});
</script>