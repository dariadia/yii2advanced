<?php

use yii\db\Migration;

/**
 * Class m200114_051712_add_column_to_task
 */
class m200114_051712_add_column_to_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'priority_id', $this->tinyInteger());
        $this->addColumn('task', 'status', $this->tinyInteger());
        $this->addColumn('task', 'description', $this->text());
        $this->addColumn('task', 'executor_id', $this->integer());
        $this->addColumn('task', 'is_template', $this->boolean());
        $this->addColumn(
            'task',
            'template_id',
            $this->integer()
        );
        $this->addForeignKey(
            'fk-template-id_task',
            'task',
            'template_id',
            'task',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'priority_id');
        $this->dropColumn('task', 'status');
        $this->dropColumn('task', 'description');
        $this->dropColumn('task', 'executor_id');
        $this->dropColumn('task', 'is_template');


        $this->dropForeignKey('fk-template-id_task', 'task');
        $this->dropColumn('task', 'is_template');
    }
}
