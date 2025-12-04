<?php

namespace app\modules\dmf\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class ListForm extends Model
{
    public $category_id;
    public $subCategory_id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['category_id', 'subCategory_id'], 'required'],
            [['category_id', 'subCategory_id'], 'integer'],


        ];
    }


    public function attributeLabels()
    {
        return [
            'category_id' => 'Категория',
            'subCategory_id' => 'Под-категория',
        ];
    }
}
