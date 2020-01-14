<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\models\User;

class Task extends ActiveRecord
{
    public static function tableName()
    {
        return 'task';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time()
            ],
        ];
    }

    public function rules()
    {
        return [
            [['author_id', 'exec_id'], 'integer'],
            [['author_id', 'started_at', 'deadline', 'status'], 'required'],
            [['title'], 'string', 'max' => 255],
            ['started_at', 'compare', 'compareAttribute' => 'deadline', 'operator' => '<=', 'enableClientValidation' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'Автор',
            'exec_id' => 'Исполнитель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    public function getExec()
    {
        return $this->hasOne(User::class, ['id' => 'exec_id']);
    }

    public static function findOne($condition)
    {
        if (Yii::$app->cache->exists(self::class . '_' . $condition) === false) {
            $result = parent::findOne($condition);
            Yii::$app->cache->set(self::class . '_' . $condition, $result);
            return $result;
        } else {
            return Yii::$app->cache->get(self::class . '_' . $condition);
        }
    }
}
