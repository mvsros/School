<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pupil */

$this->title = $model->pupil_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет'), 'url' => ['/room']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет вчителя'), 'url' => ['/room/teacher/index']];
$this->params['breadcrumbs'][] = ['label' => 'Учні', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pupil-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('@app/modules/room/views/teacher/_menu') ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pupil_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pupil_id], [
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
            'pupil_id',
            'pupil_name',
            'mobile',
            'email:email',
            'group_id',
            'address',
            'birth_date',
            'date_updated',
        ],
    ]) ?>

</div>
