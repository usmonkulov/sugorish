<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_profile}}`.
 */
class m230801_093238_create_user_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_profile}}', [
            'user_id'           => $this->primaryKey(),
            'first_name'        => $this->string()->notNull(),
            'last_name'         => $this->string()->notNull(),
            'middle_name'       => $this->string(),
            'birthday'          => $this->date()->notNull(),
            'gender'            => $this->string(1)->defaultValue('m')->notNull(),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull(),
            'address'           => $this->text()->notNull(),
            'created_by'        => $this->integer()->notNull(),
            'updated_by'        => $this->integer(),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'        => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_profile-user_id}}',
            '{{%user_profile}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_profile-user_id}}',
            '{{%user_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_profile-created_by}}',
            '{{%user_profile}}',
            'created_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_profile-created_by}}',
            '{{%user_profile}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-user_profile-updated_by}}',
            '{{%user_profile}}',
            'updated_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_profile-updated_by}}',
            '{{%user_profile}}',
            'updated_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_profile-user_id}}',
            '{{%user_profile}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_profile-user_id}}',
            '{{%user_profile}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_profile-created_by}}',
            '{{%user_profile}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_profile-created_by}}',
            '{{%user_profile}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_profile-updated_by}}',
            '{{%user_profile}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-user_profile-updated_by}}',
            '{{%user_profile}}'
        );

        $this->dropTable('{{%user_profile}}');
    }
}
