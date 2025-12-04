<?php

namespace app\modules\dmf\controllers;

use app\models\Category;
use app\modules\dmf\models\ListForm;
use app\modules\dmf\models\SubCategory;

class LinkListController extends \yii\web\Controller
{




    public function actionIndex()
    {
        $listMain = Category::getCategories();
        $listSub = [];
        $model = new ListForm();

        return $this->render('index', [
            'model' => $model,
            'listMain' => $listMain,
            'listSub' => $listSub,
        ]);
    }



    public function actionSubList($category_id)
    {
        $data = SubCategory::getSubCategories($category_id);
        return $this->asJson($data ? $data : false);
    }
}
