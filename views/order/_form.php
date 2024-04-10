<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\State;


/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'date_add')->textInput(['type' => 'date'])?>
    <?= $form->field($model, 'date_end')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'equip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_break')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(State::find()->all(), 'id', 'state')
    ) ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(User::find()->where(['role_id' => '2'])->all(), 'id', 'fio')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
