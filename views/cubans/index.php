<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * $this yii\web\View
 * $searchModel app\models\CubansSearch
 * $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Cubans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cubans-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cubans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'FirstName',
            'LastName',
            'Gender',
            'YearOfBirth',
            [
                'attribute' => 'IdGenre',
                'value' => 'genre.Name',
            ],
            'IsInGroup',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
