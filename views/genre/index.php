<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class=genre-index>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Genre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
