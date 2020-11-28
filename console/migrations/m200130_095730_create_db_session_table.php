<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%db_session}}`.
 */
class m200130_095730_create_db_session_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%db_session}}', [
            'id' => $this->primaryKey(),
            'expire' => $this->integer(),
            // 'data' => $this->blob(), не работает с ним

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%db_session}}');
    }
}
