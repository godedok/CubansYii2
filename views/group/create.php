<?php

use yii\helpers\Html;

/**
 * $this yii\web\View
 * $model app\models\Group
 */

$this->title = 'Create Group';
$this->params['breadcrumbs'][] = ['label' => 'Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
