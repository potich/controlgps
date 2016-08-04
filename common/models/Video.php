<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $name
 * @property integer $order
 * @property string $link_youtube
 * @property string $created_at
 * @property integer $server_id
 * @property boolean $active
 *
 * @property Server $server
 */
class Video extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'order', 'link_youtube', 'server_id'], 'required'],
            [['order', 'server_id'], 'integer'],
            [['created_at'], 'safe'],
            [['active'], 'boolean'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['link_youtube'], 'string', 'max' => 300],
            [['server_id'], 'exist', 'skipOnError' => true, 'targetClass' => Server::className(), 'targetAttribute' => ['server_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'order' => Yii::t('app', 'Order'),
            'link_youtube' => Yii::t('app', 'Link Youtube'),
            'created_at' => Yii::t('app', 'Created At'),
            'server_id' => Yii::t('app', 'server_id'),
            'active' => Yii::t('app', 'Active'),
            'description'  => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServer() {
        return $this->hasOne(Server::className(), ['id' => 'server_id']);
    }

}
