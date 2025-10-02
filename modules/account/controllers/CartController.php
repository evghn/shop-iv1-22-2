<?php

namespace app\modules\account\controllers;

use app\models\Cart;
use app\models\CartItem;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cart models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $cart = Cart::findOne(['user_id' => Yii::$app->user->id]);


        $dataProviderItems = new ActiveDataProvider([
            'query' => CartItem::find()
                ->where('cart_item.cart_id = cart.id')


                ->innerJoin('cart', 'cart.user_id = ' . Yii::$app->user->id),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        // VarDumper::dump($dataProviderItems->query->createCommand()->rawSql, 10, true);
        // VarDumper::dump($cart->attributes, 10, true);
        // die;

        return $this->render('index', [
            'cart' => $cart,
            'dataProviderItems' => $dataProviderItems,
        ]);
    }


    public function actionAdd($product_id)
    {
        $model = Cart::findOne(['user_id' => Yii::$app->user->id]) ?? Cart::create();
        $model->addItem($product_id);
        return $this->redirect('/account/cart');
    }


    public function actionDec($item_id)
    {
        $model = Cart::findOne(['user_id' => Yii::$app->user->id]);
        $model->addDec($item_id);
        return $this->redirect('/account/cart');
    }


    public function actionDelete($item_id)
    {
        $model = CartItem::findOne(['id' => $item_id]);
        if ($model) {
            $model->delete();
        }
        return $this->redirect('/account/cart');
    }

    public function actionClear($id)
    {
        $model = Cart::findOne($id);
        if ($model) {
            $model->delete();
        }
        return $this->redirect('/account/cart');
    }
}
