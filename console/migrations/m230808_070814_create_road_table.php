<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%road}}`.
 */
class m230808_070814_create_road_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%road}}', [
            'id' => $this->primaryKey(),
            'title_uz'              => $this->string()->notNull(),
            'title_oz'              => $this->string()->notNull(),
            'title_ru'              => $this->string()->notNull(),
            'km'                    => $this->string()->notNull()->unique(),
            'code_name'             => $this->string()->notNull()->unique(),
            'address'               => $this->text(),
            'coordination'          => $this->text(),
            'region_id'             => $this->integer()->notNull(),
            'district_id'           => $this->integer()->notNull(),
            'type_id'               => $this->integer()->notNull(),
            'enterprise_expert_id'  => $this->integer()->notNull(),
            'plot_chief_id'         => $this->integer()->notNull(),
            'water_employee_id'     => $this->integer()->notNull(),
            'status'                => $this->smallInteger()->defaultValue(1)->notNull(),
            'image_url'             => $this->text(),
            'created_by'            => $this->integer()->notNull(),
            'updated_by'            => $this->integer(),
            'created_at'            => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'            => $this->timestamp(),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-road-region_id}}',
            '{{%road}}',
            'region_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-road-region_id}}',
            '{{%road}}',
            'region_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-road-district_id}}',
            '{{%road}}',
            'district_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-road-district_id}}',
            '{{%road}}',
            'district_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `type_id`
        $this->createIndex(
            '{{%idx-road-type_id}}',
            '{{%road}}',
            'type_id'
        );

        // add foreign key for table `{{%enum_road_type}}`
        $this->addForeignKey(
            '{{%fk-road-type_id}}',
            '{{%road}}',
            'type_id',
            '{{%enum_road_type}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `enterprise_expert_id`
        $this->createIndex(
            '{{%idx-road-enterprise_expert_id}}',
            '{{%road}}',
            'enterprise_expert_id'
        );

        // add foreign key for table `{{%enum_road_employees}}`
        $this->addForeignKey(
            '{{%fk-road-enterprise_expert_id}}',
            '{{%road}}',
            'enterprise_expert_id',
            '{{%enum_road_employees}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `plot_chief_id`
        $this->createIndex(
            '{{%idx-road-plot_chief_id}}',
            '{{%road}}',
            'plot_chief_id'
        );

        // add foreign key for table `{{%enum_road_employees}}`
        $this->addForeignKey(
            '{{%fk-road-plot_chief_id}}',
            '{{%road}}',
            'plot_chief_id',
            '{{%enum_road_employees}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `water_employee_id`
        $this->createIndex(
            '{{%idx-road-water_employee_id}}',
            '{{%road}}',
            'water_employee_id'
        );

        // add foreign key for table `{{%enum_road_employees}}`
        $this->addForeignKey(
            '{{%fk-road-water_employee_id}}',
            '{{%road}}',
            'water_employee_id',
            '{{%enum_road_employees}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-road-created_by}}',
            '{{%road}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-road-created_by}}',
            '{{%road}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-road-updated_by}}',
            '{{%road}}',
            'updated_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-road-updated_by}}',
            '{{%road}}',
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
        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-road-region_id}}',
            '{{%road}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-road-region_id}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-road-district_id}}',
            '{{%road}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-road-district_id}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%enum_road_type}}`
        $this->dropForeignKey(
            '{{%fk-road-type_id}}',
            '{{%road}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            '{{%idx-road-type_id}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%enum_road_employees}}`
        $this->dropForeignKey(
            '{{%fk-road-enterprise_expert_id}}',
            '{{%road}}'
        );

        // drops index for column `enterprise_expert_id`
        $this->dropIndex(
            '{{%idx-road-enterprise_expert_id}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%enum_road_employees}}`
        $this->dropForeignKey(
            '{{%fk-road-plot_chief_id}}',
            '{{%road}}'
        );

        // drops index for column `plot_chief_id`
        $this->dropIndex(
            '{{%idx-road-plot_chief_id}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%enum_road_employees}}`
        $this->dropForeignKey(
            '{{%fk-road-water_employee_id}}',
            '{{%road}}'
        );

        // drops index for column `water_employee_id`
        $this->dropIndex(
            '{{%idx-road-water_employee_id}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-road-created_by}}',
            '{{%road}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-road-created_by}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-road-updated_by}}',
            '{{%road}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-road-updated_by}}',
            '{{%road}}'
        );

        $this->dropTable('{{%road}}');
    }
}
