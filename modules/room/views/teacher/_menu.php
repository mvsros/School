<?php

/* 
 * This file is part of the Dektrium project
 * 
 * (c) Dektrium project <http://github.com/dektrium>
 * 
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Nav;

?>

<?= Nav::widget([
    'encodeLabels' => false,
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px'
    ],
    'items' => [
        [
            'label' => '<span class="glyphicon glyphicon-th"></span> ',
            'url'     => ['/room/teacher/index'],
        ],
//        [
//            'label'   => Yii::t('user', 'Освітні програми'),
//            'url'     => ['/room/eduadmin/oppindex'],
//        ],
//        [
//            'label'   => Yii::t('user', 'Осв. прогр.'),
//            'url'     => ['/room/educate/oppindex'],//, 'ProductActionSearch[status]' => 'Продано'
//        ],
//        [
//            'label'   => Yii::t('user', 'Фільтри'),
//            'url'     => ['/filter/index'],
//        ],
        [
            'label'   => Yii::t('user', 'Скіли'),
            'url'     => ['/skills/index'],
        ],
        [
            'label'   => Yii::t('user', 'Терміни'),
            'url'     => ['/skillskey/index'],
        ],
//        [
//            'label'   => Yii::t('user', 'Соц. мережі'),
//            'items'   => [
//                [
//                    'label'   => Yii::t('user', 'Твітер'),
//                    'url'     => ['/content/index'],///user/admin/info
//                    'linkOptions' => ['target' => '_blank']
//                ],
//                [
//                    'label'   => Yii::t('user', 'Google+'),
//                    'url'     => ['/content/index'],
//                ],
//
//            ]
//
//        ],
//
//        [
//            'label'   => Yii::t('user', 'Звіти'),
//            'url'     => ['/room/content/report'],
//        ],
    ]
]) ?>
<?= $this->render('@app/modules/room/views/_alert', ['module' => Yii::$app->getModule('user')]) ?>

