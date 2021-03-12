<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pupil */

$this->title = 'Create Pupil';
$this->params['breadcrumbs'][] = ['label' => 'Pupils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pupil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
