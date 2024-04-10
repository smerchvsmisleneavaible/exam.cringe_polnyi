<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderDetail $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Order::find()->all(), 'id', 'id')
    ) ?>

    <?= $form->field($model, 'catalog_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Catalog::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'date_order')->textInput(['type' => 'date'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
