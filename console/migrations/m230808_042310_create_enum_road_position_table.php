<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enum_road_position}}`.
 */
class m230808_042310_create_enum_road_position_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enum_road_position}}', [
            'id'                => $this->primaryKey(),
            'title_uz'          => $this->string()->notNull()->unique(),
            'title_oz'          => $this->string()->notNull()->unique(),
            'title_ru'          => $this->string()->notNull()->unique(),
            'code_name'         => $this->string()->notNull()->unique(),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull(),
            'created_by'        => $this->integer()->notNull(),
            'updated_by'        => $this->integer(),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'        => $this->timestamp(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-enum_road_position-created_by}}',
            '{{%enum_road_position}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-enum_road_position-created_by}}',
            '{{%enum_road_position}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-enum_road_position-updated_by}}',
            '{{%enum_road_position}}',
            'updated_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-enum_road_position-updated_by}}',
            '{{%enum_road_position}}',
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
            '{{%fk-enum_road_position-created_by}}',
            '{{%enum_road_position}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-enum_road_position-created_by}}',
            '{{%enum_road_position}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_position-updated_by}}',
            '{{%enum_road_position}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-enum_road_position-updated_by}}',
            '{{%enum_road_position}}'
        );

        $this->dropTable('{{%enum_road_position}}');
    }
}
