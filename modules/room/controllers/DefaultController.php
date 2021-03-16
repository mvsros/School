<?php

namespace app\modules\room\controllers;

use yii\db\Connection;
use yii\web\Controller;

/**
 * Default controller for the `room` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $db = new Connection(\Yii::$app->db);
        $id = \Yii::$app->user->getId();
        $roles = \Yii::$app->authManager->getRolesByUser($id);

        $profile = $db->createCommand('SELECT * FROM profile WHERE user_id=:userid')
            ->bindValue(':userid', $id)
            ->queryOne();

        return $this->render('index',[
            'roles' => $roles,
            'profile' => $profile,
        ]);

        return $this->render('index');
    }
}
