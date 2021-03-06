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
            'email' => $this->string()->notNull()->unique(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'type_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_users_user_role_id',
            'users',
            'type_id',
            'user_types',
            'id',
            'CASCADE'
        );

        $this->insert('users', ['name' => 'Syed', 'email' => 'syed.naeem@rhinos-me.com', 'username' => 'admin', 'password' => 'admin', 'type_id' => 1]);
        $this->insert('users', ['name' => 'User', 'email' => 'user@gmail.com', 'username' => 'user', 'password' => 'user', 'type_id' => 2]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
