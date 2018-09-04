<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * $this yii\web\View
 * $model app\models\Group
 */

$this->title = $model->NameGroup;
$this->params['breadcrumbs'][] = ['label' => 'Group', 'url' =>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idGroup], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idGroup], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idGroup',
            'NameGroup',
        ],
    ]) ?>

</div>
