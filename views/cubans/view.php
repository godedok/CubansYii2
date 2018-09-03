<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cubans */

$this->title = $model->FirstName . " " . $model->LastName;
$this->params['breadcrumbs'][] = ['label' => 'Cubans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cubans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
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
            'Id',
            'FirstName',
            'LastName',
            'Gender',
            'YearOfBirth',
            'genre.Name',    
            'IsInGroup',
        ],
    ]) ?>

</div>
