<?php

use yii\helpers\Html;

/**
 *  $this yii\web\View 
 *  $model app\models\Cubans 
 */

$this->title = 'Update Cubans: ' . $model->FirstName . ' ' . $model->LastName;
$this->params['breadcrumbs'][] = ['label' => 'Cubans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FirstName . ' ' . $model->LastName, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cubans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
