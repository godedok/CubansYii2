<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * $this yii\web\View
 * $model app\models\Genre
 * $form yii\widgets\ActiveForm
 */

?>

<div class="genre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
