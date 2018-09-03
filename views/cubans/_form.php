<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Genre;


/* @var $this yii\web\View */
/* @var $model app\models\Cubans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cubans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'YearOfBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdGenre')->dropDownList(ArrayHelper::map(Genre::find()->all(), 'id', 'Name')) ?>

    <?= $form->field($model, 'IsInGroup')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
