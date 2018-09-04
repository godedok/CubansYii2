<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * $this yii\web\View
 * $searchModel app\models\GroupSearch
 * $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class=group-index>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NameGroup',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
