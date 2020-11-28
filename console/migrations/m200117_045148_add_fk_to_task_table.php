<?php

use yii\db\Migration;

/**
 * Class m200117_045148_add_fk_to_task_table
 */
class m200117_045148_add_fk_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-task-author_id', 'task', 'author_id', 'user', 'id');
        $this->addForeignKey('fk-task-executor_id', 'task', 'executor_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-task-author_id', 'task');
        $this->dropForeignKey('fk-task-executor_id', 'task');
    }
}
