<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pupil */

$this->title = 'Update Pupil: ' . $model->pupil_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет'), 'url' => ['/room']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет вчителя'), 'url' => ['/room/teacher/index']];
$this->params['breadcrumbs'][] = ['label' => 'Учні', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pupil_id, 'url' => ['view', 'id' => $model->pupil_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pupil-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('@app/modules/room/views/teacher/_menu') ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
