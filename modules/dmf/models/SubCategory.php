<?php

namespace app\modules\dmf\models;

use app\models\Category;
use Yii;

/**
 * This is the model class for table "sub_category".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 *
 * @property Category $category
 */
class SubCategory extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }


    public static function getSubCategories($category_id)
    {
        return static::find()
            ->select("title")
            ->where(["category_id" => $category_id])
            ->indexBy("id")
            ->column();
    }
}
