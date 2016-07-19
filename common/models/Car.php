<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property string $licence
 * @property string $telephone_number
 * @property integer $user_id
 * @property integer $device_id
 * @property boolean $active
 *
 * @property Device $device
 * @property User $user
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['licence', 'user_id'], 'required'],
            [['user_id', 'device_id'], 'integer'],
            [['active'], 'boolean'],
            [['licence'], 'string', 'max' => 50],
            [['telephone_number'], 'string', 'max' => 60],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::className(), 'targetAttribute' => ['device_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'licence' => Yii::t('app', 'Licence'),
            'telephone_number' => Yii::t('app', 'Telephone Number'),
            'user_id' => Yii::t('app', 'User ID'),
            'device_id' => Yii::t('app', 'Device ID'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::className(), ['id' => 'device_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
