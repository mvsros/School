<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ParentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('@app/modules/room/views/teacher/_menu') ?>
    <p>
        <?= Html::a('Create Parents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'parent_id',
            'parent_name',
            'mobile',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
