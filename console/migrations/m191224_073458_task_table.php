<?php

use yii\db\Migration;

/**
 * Class m191224_073458_task_table
 */
class m191224_073458_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'started_at' => $this->bigInteger(),
            'deadline' => $this->bigInteger(),
            'author_id' => $this->integer(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger(),
        ]);
        $this->createIndex('idx-author_id-task-table', 'task', 'author_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-author_id-task-table', 'task');
        $this->dropTable('{{%task}}');
    }
}
