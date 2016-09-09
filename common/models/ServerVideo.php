<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "server_video".
 *
 * @property integer $id
 * @property integer $server_id
 * @property integer $video_id
 *
 * @property Server $server
 * @property Video $video
 */
class ServerVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'server_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['server_id', 'video_id'], 'integer'],
            [['server_id'], 'exist', 'skipOnError' => true, 'targetClass' => Server::className(), 'targetAttribute' => ['server_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'server_id' => Yii::t('app', 'Server ID'),
            'video_id' => Yii::t('app', 'Video ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServer()
    {
        return $this->hasOne(Server::className(), ['id' => 'server_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
