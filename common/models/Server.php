<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "server".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $ip
 *
 * @property ServerReport[] $serverReports
 * @property User[] $users
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'server';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'ip'], 'string', 'max' => 200],
            ['active', 'boolean' ],
            [['name', 'url' ], 'required'],
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
            'url' => Yii::t('app', 'Url'),
            'ip' => Yii::t('app', 'Ip'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServerReports()
    {
        return $this->hasMany(ServerReport::className(), ['server_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['server_id' => 'id']);
    }
}
