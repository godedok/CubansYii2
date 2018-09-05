<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Genre;
use app\models\Group;

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
            'YearOfBirth',
            [
                'attribute' => 'Gender',
                'filter' => [
                    'male',
                    'female',
                ],
            ],
            [
                'attribute' => 'IdGenre',
                'filter' => Genre::getAllGenres(),
                'value' => 'genre.Name',
            ],
            [
                'attribute' => 'IsInGroup',
                'filter' => Group::getAllGroups(),
                'value' => 'group.NameGroup',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
