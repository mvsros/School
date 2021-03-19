<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pupil */

$this->title = 'Create Pupil';
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет'), 'url' => ['/room']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет вчителя'), 'url' => ['/room/teacher/index']];
$this->params['breadcrumbs'][] = ['label' => 'Учні', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pupil-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('@app/modules/room/views/teacher/_menu') ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
