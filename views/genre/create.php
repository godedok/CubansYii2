<?php

use yii\helpers\Html;

/**
 * $this yii\web\View
 * $model app\models\Genre
 */

$this->title = 'Create Genre';
$this->params['breadcrumbs'][] = ['label' => 'Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
