<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enum_road_employees}}`.
 */
class m230808_043730_create_enum_road_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enum_road_employees}}', [
            'id'                => $this->primaryKey(),
            'first_name'        => $this->string()->notNull(),
            'last_name'         => $this->string()->notNull(),
            'middle_name'       => $this->string(),
            'birthday'          => $this->date()->notNull(),
            'phone'             => $this->string(50)->notNull()->unique(),
            'email'             => $this->string(50)->unique(),
            'gender'            => $this->string(1)->defaultValue('m')->notNull(),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull(),
            'position_id'       => $this->integer()->notNull(),
            'code_position'     => $this->string(50)->notNull(),
            'region_id'         => $this->integer()->notNull(),
            'district_id'       => $this->integer()->notNull(),
            'address'           => $this->text()->notNull(),
            'created_by'        => $this->integer()->notNull(),
            'updated_by'        => $this->integer(),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'        => $this->timestamp(),
            'CONSTRAINT first_last_middle_key UNIQUE (first_name, last_name, birthday)'
        ]);

        // creates index for column `position_id`
        $this->createIndex(
            '{{%idx-enum_road_employees-position_id}}',
            '{{%enum_road_employees}}',
            'position_id'
        );

        // add foreign key for table `{{%enum_road_position}}`
        $this->addForeignKey(
            '{{%fk-enum_road_employees-position_id}}',
            '{{%enum_road_employees}}',
            'position_id',
            '{{%enum_road_position}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-enum_road_employees-region_id}}',
            '{{%enum_road_employees}}',
            'region_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-enum_road_employees-region_id}}',
            '{{%enum_road_employees}}',
            'region_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-enum_road_employees-district_id}}',
            '{{%enum_road_employees}}',
            'district_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-enum_road_employees-district_id}}',
            '{{%enum_road_employees}}',
            'district_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-enum_road_employees-created_by}}',
            '{{%enum_road_employees}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-enum_road_employees-created_by}}',
            '{{%enum_road_employees}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-enum_road_employees-updated_by}}',
            '{{%enum_road_employees}}',
            'updated_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-enum_road_employees-updated_by}}',
            '{{%enum_road_employees}}',
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
        // drops foreign key for table `{{%enum_road_position}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_employees-position_id}}',
            '{{%enum_road_employees}}'
        );

        // drops index for column `position_id`
        $this->dropIndex(
            '{{%idx-enum_road_employees-position_id}}',
            '{{%enum_road_employees}}'
        );

        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_employees-region_id}}',
            '{{%enum_road_employees}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-enum_road_employees-region_id}}',
            '{{%enum_road_employees}}'
        );

        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_employees-district_id}}',
            '{{%enum_road_employees}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-enum_road_employees-district_id}}',
            '{{%enum_road_employees}}'
        );


        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_employees-created_by}}',
            '{{%enum_road_employees}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-enum_road_employees-created_by}}',
            '{{%enum_road_employees}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-enum_road_employees-updated_by}}',
            '{{%enum_road_employees}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-enum_road_employees-updated_by}}',
            '{{%enum_road_employees}}'
        );

        $this->dropTable('{{%enum_road_employees}}');
    }
}
