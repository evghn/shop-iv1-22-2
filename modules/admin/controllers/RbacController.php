<?php

namespace app\modules\admin\controllers;

use app\models\User;
use Yii;
use yii\helpers\VarDumper;

class RbacController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $admin->description = "Роль администратора";
        $auth->add($admin);

        $client = $auth->createRole('client');
        $client->description = "Роль клиента";
        $auth->add($client);

        $canAdmin = $auth->createPermission('canAdmin');
        $canAdmin->description = 'Админ может все!';
        $auth->add($canAdmin);
        $auth->addChild($admin, $canAdmin);

        $canClient = $auth->createPermission('canClient');
        $canClient->description = 'Права клиента';
        $auth->add($canClient);
        $auth->addChild($client, $canClient);





        $auth->assign($admin, Yii::$app->user->id);
        $users = User::find()
            ->select("id")
            ->where(['role' => 0])
            ->column();


        if ($users) {
            foreach ($users as $user_id) {
                $auth->assign($client, $user_id);
            }
        }
        VarDumper::dump($users, 10, true);

        die;



        echo "ok";
        exit;
    }
}
