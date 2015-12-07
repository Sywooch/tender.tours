<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
/* @var $form ActiveForm */
?>
<div class="registration-regform">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'USERNAME') ?>
        <?= $form->field($model, 'PASSWORD_HASH') ?>
        <?= $form->field($model, 'PASSWORD_RESET_TOKEN') ?>
        <?= $form->field($model, 'EMAIL') ?>
        <?= $form->field($model, 'TYPE') ?>
        <?= $form->field($model, 'STATUS') ?>
        <?= $form->field($model, 'CREATED_AT') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- registration-regform -->
