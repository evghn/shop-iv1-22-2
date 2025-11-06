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
    public $like_count;
    public $dislike_count;

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
            'id' => '№ товара',
            'title' => 'Наименование',
            'description' => 'Описание',
            'cost' => 'Цена (₽)',
            'amount' => 'Количество',
            'category_id' => 'Категория',
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
    public function getProductImage()
    {
        return $this->hasOne(ProductImage::class, ['product_id' => 'id']);
    }

    /** 
     * Gets query for [[CartItems]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItem::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Favourites]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */

    public function getFavourites()
    {
        // if (!Yii::$app->user->isGuest) {
        //     return $this->hasOne(Favourite::class, ['product_id' => 'id', 'user_id' => Yii::$app->user->id]);
        // }
        return $this->hasMany(Favourite::class, ['product_id' => 'id']);
    }


    /** 
     * Gets query for [[UserActionProducts]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */
    public function getUserActionProducts()
    {
        return $this->hasMany(UserActionProduct::class, ['product_id' => 'id']);
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
