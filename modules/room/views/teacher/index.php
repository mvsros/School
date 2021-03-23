<?php
/* @var $this yii\web\View */

$this->title = Yii::t('user', 'Кабінет вчителя');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Кабінет'), 'url' => ['/room']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Контент-менеджер'), 'url' => ['/room/content/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Кабінет вчителя</h1>
<?= $this->render('_menu') ?>
<h3>Функціонал</h3>
<!--p>
    У кабінеті продавця можливо проконтолювати наявність товару, його місцезнаходження та всі операції з ним.
</p-->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <h2>Навчальні класи</h2>
        <p style="text-align: center; color: #0b93d5"><span style="font-size: 75px; " class="glyphicon glyphicon-send"></span></p>
        <p>Інформація про класи.</p>
        <p> <a class="btn btn-default btn-lg" href="../../pupillesson/index"><span class="glyphicon glyphicon-random gi-3x"></span> Класи &raquo;</a></p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <h2>Батьки</h2>
        <p style="text-align: center; color: #0b93d5"><span style="font-size: 75px; " class="glyphicon glyphicon-user"></span></p>
        <p>Контакти.</p>
        <p><a class="btn btn-default btn-lg" href="../../parents/index"><span class="glyphicon glyphicon-shopping-cart"></span> Дивитись &raquo;</a></p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <h2>Учні</h2>
        <p style="text-align: center; color: #0b93d5"><span style="font-size: 75px; " class="glyphicon glyphicon-sunglasses"></span></p>
        <p>Всі учеі</p>
        <p><a class="btn btn-default btn-lg" href="../../pupil/index"><span class="glyphicon glyphicon-stats"></span> Учні &raquo;</a></p>
    </div>

</div