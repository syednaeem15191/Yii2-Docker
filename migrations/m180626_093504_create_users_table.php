<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180626_093504_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'role_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_users_user_role_id',
            'users',
            'role_id',
            'user_roles',
            'id',
            'CASCADE'
        );

        $this->insert('users', ['name' => 'Syed', 'username' => 'admin', 'password' => 'admin', 'role_id' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
