<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property integer $id
 * @property string $name
 * @property integer $brand_id
 * @property string $RESET_GPS
 * @property string $OFF_IBUTTON
 * @property string $ON_IBUTTON
 * @property boolean $active
 *
 * @property CarLicense[] $carLicenses
 * @property BrandDevice $brand
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'brand_id', 'RESET_GPS', 'OFF_IBUTTON', 'ON_IBUTTON'], 'required'],
            [['brand_id'], 'integer'],
            [['active'], 'boolean'],
            [['name'], 'string', 'max' => 200],
            [['RESET_GPS', 'OFF_IBUTTON', 'ON_IBUTTON'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => BrandDevice::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'RESET_GPS' => Yii::t('app', 'Reset  Gps'),
            'OFF_IBUTTON' => Yii::t('app', 'Off  Ibutton'),
            'ON_IBUTTON' => Yii::t('app', 'On  Ibutton'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarLicenses()
    {
        return $this->hasMany(CarLicense::className(), ['device_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(BrandDevice::className(), ['id' => 'brand_id']);
    }
}
