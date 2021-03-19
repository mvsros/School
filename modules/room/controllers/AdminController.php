<?php

namespace app\modules\room\controllers;

use yii\db\Connection;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `room` module
 */
class AdminController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('admin')) {
            return $this->render('index');
        }
        else
            throw new ForbiddenHttpException();

//        $db = new Connection(\Yii::$app->db);
//        $id = \Yii::$app->user->getId();
//        $roles = \Yii::$app->authManager->getRolesByUser($id);
//
//        $profile = $db->createCommand('SELECT * FROM profile WHERE user_id=:userid')
//            ->bindValue(':userid', $id)
//            ->queryOne();
//
//        return $this->render('index',[
//            'roles' => $roles,
//            'profile' => $profile,
//        ]);


    }
}
