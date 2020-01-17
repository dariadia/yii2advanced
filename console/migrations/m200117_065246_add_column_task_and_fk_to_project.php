<?php

use yii\db\Migration;

/**
 * Class m200117_065246_add_column_task_and_fk_to_project
 */
class m200117_065246_add_column_task_and_fk_to_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'task',
            'project_id',
            $this->integer()
        );
        $this->addForeignKey('fk-task-project_id', 'task', 'project_id', 'project', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-task-project_id', 'task');
        $this->dropColumn('task', 'project_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200117_065246_add_column_task_and_fk_to_project cannot be reverted.\n";

        return false;
    }
    */
}
