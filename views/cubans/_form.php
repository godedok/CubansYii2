<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Group;
use app\models\Genre;

/**
 * $this yii\web\View
 * $model app\models\Cubans
 * $form yii\widgets\ActiveForm
 */

?>

<div class="cubans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'YearOfBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdGenre')->dropDownList(Genre::getAllGenres()) ?>

    <?= $form->field($model, 'IsInGroup')->dropDownList(Group::getAllGroups()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
