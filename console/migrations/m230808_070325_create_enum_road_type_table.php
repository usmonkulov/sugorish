<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enum_road_type}}`.
 */
class m230808_070325_create_enum_road_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enum_road_type}}', [
            'id'                => $this->primaryKey(),
            'title_uz'          => $this->string()->notNull(),
            'title_oz'          => $this->string()->notNull(),
            'title_ru'          => $this->string()->notNull(),
            'code_name'         => $this->string()->notNull(),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull(),
            'created_by'        => $this->integer()->notNull(),
            'updated_by'        => $this->integer(),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'        => $this->timestamp(),
            'CONSTRAINT uz_oz_ru_code_name_key UNIQUE (title_uz, title_oz, title_ru, code_name)'
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-enum_road_type-created_by}}',
            '{{%enum_road_type}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-enum_road_type-created_by}}',
            '{{%enum_road_type}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-enum_road_type-updated_by}}',
            '{{%enum_road_type}}',
            'updated_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-enum_road_type-updated_by}}',
            '{{%enum_road_type}}',
            'updated_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );

//        $this->insert('{{%enum_road_type}}', ['title_uz' => 'Маҳаллий','title_oz' => 'Mahalliy', 'title_ru' => 'Местный', 'code_name' => '4K-', 'created_by' => 1]);
//        $this->insert('{{%enum_road_type}}', ['title_uz' => 'Маҳаллий','title_oz' => 'Mahalliy', 'title_ru' => 'Местный', 'code_name' => '4H-', 'created_by' => 1]);
//        $this->insert('{{%enum_road_type}}', ['title_uz' => 'Давлат','title_oz' => 'Davlat', 'title_ru' => 'Состояние', 'code_name' => '4p-', 'created_by' => 1]);
//        $this->insert('{{%enum_road_type}}', ['title_uz' => 'Халқаро','title_oz' => 'Xalqaro', 'title_ru' => 'Международный', 'code_name' => 'M-', 'created_by' => 1]);
//        $this->insert('{{%enum_road_type}}', ['title_uz' => 'Халқаро','title_oz' => 'Xalqaro', 'title_ru' => 'Международный', 'code_name' => 'A-', 'created_by' => 1]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_type-created_by}}',
            '{{%enum_road_type}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-enum_road_type-created_by}}',
            '{{%enum_road_type}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_type-updated_by}}',
            '{{%enum_road_type}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-enum_road_type-updated_by}}',
            '{{%enum_road_type}}'
        );

        $this->dropTable('{{%enum_road_type}}');
    }
}
