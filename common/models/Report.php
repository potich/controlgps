<?php

namespace common\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $typereport_id
 * @property string $created_at
 *
 * @property TypeReport $typereport
 * @property ServerReport[] $serverReports
 */
class Report extends \yii\db\ActiveRecord {

    public $server_id;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'report';
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
            [['description'], 'string'],
            [['typereport_id'], 'integer'],
            [['created_at'], 'safe'],
            ['server_id', 'safe'],
            ['active', 'boolean'],
            [['title'], 'string', 'max' => 70],
            [['typereport_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeReport::className(), 'targetAttribute' => ['typereport_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'typereport_id' => Yii::t('app', 'Typereport ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'server_id' => Yii::t('app', 'Servers'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypereport() {
        return $this->hasOne(TypeReport::className(), ['id' => 'typereport_id']);
    }

    public function addServer($server) {
        $item = new ServerReport();
        $item->server_id = $server;
        $item->report_id = $this->id;
        $item->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServerReports() {
        return $this->hasMany(ServerReport::className(), ['report_id' => 'id']);
    }

}
