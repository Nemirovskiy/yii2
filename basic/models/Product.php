<?php

namespace app\models;

use Yii;
use yii\validators\FilterValidator;
use yii\validators\Validator;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['name','price'],
            self::SCENARIO_UPDATE => ['price'],
            self::SCENARIO_DEFAULT => ['price']
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'integer', 'min' => 1, 'max' => 1000],
            [['name'], 'filter', 'filter' => function($value){
                return trim(strip_tags($value));
            } ],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
