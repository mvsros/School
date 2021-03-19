<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PupilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Учні';
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет'), 'url' => ['/room']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет вчителя'), 'url' => ['/room/teacher/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pupil-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('@app/modules/room/views/teacher/_menu') ?>
    <p>
        <?= Html::a('Create Pupil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pupil_id',
            'pupil_name',
            'mobile',
            'email:email',
//            'group.group_name',
            [
                'attribute' => 'group',
                'value' => 'group.group_name',
            ],
//            'group_id',
            //'address',
            //'birth_date',
            //'date_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
