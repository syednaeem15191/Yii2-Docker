<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_roles`.
 */
class m180626_091619_create_user_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_roles', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->insert('user_roles', ['name' => 'Super Admin']);
        $this->insert('user_roles', ['name' => 'User']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_roles');
    }
}
