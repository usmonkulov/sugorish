<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_roles}}`.
 */
class m230801_093438_create_user_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%auth_items}}', ['type', 'name', 'description'], [
            [1, 'user', 'User'],
            [1, 'admin', 'Admin'],
        ]);

        $this->batchInsert('{{%auth_item_children}}', ['parent', 'child'], [
            ['admin', 'user'],
        ]);

        $this->execute('INSERT INTO {{%auth_assignments}} (item_name, user_id) SELECT \'user\', u.id FROM {{%user}} u ORDER BY u.id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%auth_items}}', ['name' => ['user', 'admin']]);
    }
}
