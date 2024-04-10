<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Report $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(User::find()->where(['role_id' => '2'])->all(), 'id', 'fio')
    ) ?>

    <?= $form->field($model, 'order_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Order::find()->all(), 'id', 'id')
    ) ?>

    <?= $form->field($model, 'rate')->dropDownList(([
        '1',
        '2',
        '3',
        '4',
        '5',
    ])) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
