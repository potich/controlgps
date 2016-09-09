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
 * @property boolean $active
 *
 */
class Video extends ActiveRecord {

    public $server_id;

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
            [['name', 'order', 'link_youtube'], 'required'],
            [['order'], 'integer'],
            [['created_at'], 'safe'],
            [['active'], 'boolean'],
            ['server_id', 'safe'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['link_youtube'], 'string', 'max' => 300],
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
            'active' => Yii::t('app', 'Active'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    public function addServer($server) {
        $item = new ServerVideo();
        $item->server_id = $server;
        $item->video_id = $this->id;
        $item->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServerVideos() {
        return $this->hasMany(ServerVideo::className(), ['video_id' => 'id']);
    }

}
