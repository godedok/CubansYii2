<?php

use yii\helpers\Html;
use app\controllers\CubanController;


/* @var $this yii\web\View */
/* @var $model app\models\Cubans */

$this->title = 'Create Cubans';
$this->params['breadcrumbs'][] = ['label' => 'Cubans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cubans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
