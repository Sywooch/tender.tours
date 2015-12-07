<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registration Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-form-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <label>Звезда 1</label><input type="checkbox" name="star[0]" value="1" />
<label>Звезда 2</label><input type="checkbox" name="star[1]" value="1" />
<label>Звезда 3</label><input type="checkbox" name="star[2]" value="1" />

->post()
['star' => ['0' => '1', '1' => '', '2' => 1]]

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'USERNAME',
            'EMAIL:email', //:url, :image, :boolean, :date, :time, :html, :text, :raw, :decimal, :currency, ...
            'TYPE',
            'STATUS',
            'CREATED_AT',
        ],
    ]) ?>

</div>
