<?php

use yii\db\Migration;

/**
 * Class m200117_074838_add_column_fk_project_parent
 */
class m200117_074838_add_column_fk_project_parent extends Migration
{
    public function safeUp()
    {
        $this->addColumn(
            'project',
            'is_parent',
            $this->boolean()
        );
        $this->addColumn(
            'project',
            'parent_project_id',
            $this->integer()
        );
        $this->addForeignKey(
            'fk-parent-id_project',
            'project',
            'parent_project_id',
            'project',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-parent-id_project', 'project');
        $this->dropColumn('project', 'is_parent');
        $this->dropColumn('project', 'parent_project_id');
    }
}
