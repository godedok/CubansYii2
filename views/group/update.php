<?php

use yii\helpers\Html;

/**
 * $this yii\web\View
 * $model app\models\Group
 */

$this->title = 'Update Group: ' . $model->NameGroup;
$this->params['breadcrumbs'][] = ['label' => 'Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NameGroup, 'url' => ['view', 'id' => $model->idGroup]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="group-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
