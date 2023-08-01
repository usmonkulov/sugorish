<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_refresh_token}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m230801_092458_create_user_refresh_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_refresh_token}}', [
            'id'             => $this->primaryKey(),
            'user_id'        => $this->integer(),
            'refresh_token'  => $this->text()->unique(),
            'expired_date'   => $this->timestamp(),
            'ip'             => $this->text(),
            'user_agent'     => $this->text(),
            'created_at'     => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_refresh_token-user_id}}',
            '{{%user_refresh_token}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_refresh_token-user_id}}',
            '{{%user_refresh_token}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-user_refresh_token-user_id}}',
            '{{%user_refresh_token}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_refresh_token-user_id}}',
            '{{%user_refresh_token}}'
        );

        $this->dropTable('{{%user_refresh_token}}');
    }
}
