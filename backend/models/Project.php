<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use frontend\models\ChatLog;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property int|null $author_id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $priority_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $parent_project_id
 *
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'priority_id', 'status', 'created_at', 'updated_at', 'parent_project_id'], 'integer'],
            [['description'], 'string'],
            [['is_parent'], 'boolean'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function afterSave($insert, $changedAttribute)
    {
        if ($insert) {
            ChatLog::create([
                'username' => Yii::$app->user->identity->username,
                'message' => 'has just created a project №' . $this->id,
                'project_id' => $this->id,
            ]);
        } else { // update
            ChatLog::create([
                'username' => Yii::$app->user->identity->username,
                'message' => 'has just updated a project №' . $this->id,
                'project_id' => $this->id,
            ]);
        }
    }

    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    'value' => time(),
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'description' => 'Description',
            'priority_id' => 'Priority',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['project_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(Project::class, ['parent_project_id' => 'id']);
    }

    public function getPriority()
    {
        return $this->hasOne(Priority::class, ['id' => 'priority_id', 'type' => Priority::TYPE_PROJECT]);
    }
}
