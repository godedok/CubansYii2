<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * $this yii\web\View
 * $model app\models\Group
 * $form yii\widgets\ActiveForm
 */

?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NameGroup')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
