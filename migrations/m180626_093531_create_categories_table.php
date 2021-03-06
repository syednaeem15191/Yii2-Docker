<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m180626_093531_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique()
        ]);

        $this->insert('categories', ['name' => 'Cat 1']);
        $this->insert('categories', ['name' => 'Cat 2']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
