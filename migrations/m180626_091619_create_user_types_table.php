<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_types`.
 */
class m180626_091619_create_user_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->insert('user_types', ['name' => 'Super Admin']);
        $this->insert('user_types', ['name' => 'User']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_types');
    }
}
