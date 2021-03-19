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
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px'
    ],
    'items' => [
        [
            'label'   => Yii::t('user', 'Довідка'),
            'url'   => ['/room/admin/index'],
        ],
        [
            'label'   => Yii::t('user', 'Користувачі'),
            'items'   => [
                [
                    'label' =>  Yii::t('user', 'Адміністрування користувачів'),
                    'url'   =>  ['/user/admin'],
                    'linkOptions' => ['target' => '_blank']
                ],
                [
                    'label' =>  Yii::t('user', 'Права доступу'),
                    'url'   =>  ['/admin/'],
                    'linkOptions' => ['target' => '_blank']
                ],
                [
                    'label' =>  Yii::t('user', 'Переведення'),
                    'url'   =>  ['/room/admin/praxindex/'],
                    //'linkOptions' => ['target' => '_blank']
                ],
                [
                    'label' =>  Yii::t('user', 'Картки учнів'),
                    'url'   =>  ['/room/admin/cardindex'],
                    //'linkOptions' => ['target' => '_blank']
                ],
                [
                    'label' =>  Yii::t('user', 'Навчальні класи'),
                    'url'   =>  ['/group/index'],
                    //'linkOptions' => ['target' => '_blank']
                ],

            ]
        ],

        [
            'label'   => Yii::t('user', 'Документи'),
            'url'     => ['/room/admin/dogovor'],
        ],

        [
            'label'   => Yii::t('user', 'Розсилка'),
            'url'     => ['/room/broadcast/index'],
        ],
    ]
]) ?>
