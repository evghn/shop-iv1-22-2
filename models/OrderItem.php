<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $odrder_id
 * @property int $product_id
 * @property int $amount
 * @property float $cost
 * @property float $sum
 *
 * @property Order $odrder
 * @property Product $product
 */
class OrderItem extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'default', 'value' => 0],
            [['sum'], 'default', 'value' => 0.00],
            [['odrder_id', 'product_id'], 'required'],
            [['odrder_id', 'product_id', 'amount'], 'integer'],
            [['cost', 'sum'], 'number'],
            [['odrder_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['odrder_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'odrder_id' => 'Odrder ID',
            'product_id' => 'Product ID',
            'amount' => 'Amount',
            'cost' => 'Cost',
            'sum' => 'Sum',
        ];
    }

    /**
     * Gets query for [[Odrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOdrder()
    {
        return $this->hasOne(Order::class, ['id' => 'odrder_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

}
