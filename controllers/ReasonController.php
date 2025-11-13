<?php

namespace app\controllers;

use app\models\ReasonCancel;
use app\models\Status;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReasonController implements the CRUD actions for ReasonCancel model.
 */
class ReasonController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    'denyCallback' => fn() => $this->redirect('/')
                ],
            ],
        ];
    }

    /**
     * Creates a new ReasonCancel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($order_id)
    {
        $model = new ReasonCancel();
        $model->order_id = $order_id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->user_id = Yii::$app->user->id;
                if ($model->save()) {
                    Yii::$app->db->createCommand()
                        ->update(
                            'order',
                            ['status_id' => Status::getStatusId("cancel")],
                            "id = $order_id"
                        )->execute();

                    $url = Yii::$app->user->identity->isAdmin
                        ? "/admin/admin/"
                        : "/account/account/";
                    return $this->redirect([$url . 'view', 'id' => $model->order_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
