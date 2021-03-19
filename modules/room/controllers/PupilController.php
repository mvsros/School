<?php

namespace app\modules\room\controllers;

use yii\db\Connection;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `room` module
 */
class PupilController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('pupil')) {
            return $this->render('index');
        }
        else
            throw new ForbiddenHttpException();
    }
}
