<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property float $cost
 * @property int $amount
 * @property int $category_id
 *
 * @property Category $category
 * @property Feedback[] $feedbacks
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $fileName;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => null],
            [['amount'], 'default', 'value' => 0],
            [['title', 'cost', 'category_id'], 'required'],
            [['description'], 'string'],
            [['cost'], 'number'],
            [['amount', 'category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
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
            'description' => 'Description',
            'cost' => 'Cost',
            'amount' => 'Amount',
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

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = Yii::$app->security->generateRandomString()
                . '_'
                . time()
                . $this->imageFile->extension;
            $this->fileName = $fileName;
            $this->imageFile->saveAs('img/' . $fileName);
            return true;
        } else {
            return false;
        }
    }
}
