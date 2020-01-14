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
        $this->addColumn('task', 'status', $this->string(32)->notNull());
        $this->addColumn('task', 'description', $this->string(50));
        $this->addColumn('task', 'exec_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'status');
        $this->dropColumn('task', 'description');
        $this->dropColumn('task', 'exec_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200114_051712_add_column_to_task cannot be reverted.\n";

        return false;
    }
    */
}
