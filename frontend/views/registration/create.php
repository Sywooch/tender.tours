<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */

$this->title = Yii::t('app', 'Форма регистрации пользователя');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registration Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
