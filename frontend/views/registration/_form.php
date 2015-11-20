<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USERNAME')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD_HASH')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'password_repeat')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
