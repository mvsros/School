<?php
/**
 * Created by PhpStorm.
 * User: sucore
 * Date: 09.03.2021
 * Time: 19:14
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Countries</h1>
    <ul>
        <?php foreach ($countries as $country): ?>
            <li>
                <?= Html::encode("{$country->code} ({$country->name})") ?>:
                <?= $country->population ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>