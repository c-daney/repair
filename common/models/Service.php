<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property integer $service_id
 * @property string $name
 * @property integer $price
 * @property integer $status
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'status', 'company_id'], 'integer'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'service_id' => '服务ID',
            'name' => '服务名',
            'price' => '价格',
            'status' => '状态',
            'company_id' => '公司',
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id'=>'company_id']);
    }
}
