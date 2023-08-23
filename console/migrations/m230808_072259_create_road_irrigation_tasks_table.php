<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%road_irrigation_tasks}}`.
 */
class m230808_072259_create_road_irrigation_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%road_irrigation_tasks}}', [
            'id'             => $this->primaryKey(),
            'road_id'        => $this->integer(),
            'start_time'     => $this->timestamp()->notNull(),
            'end_time'       => $this->timestamp()->notNull(),
            'watering_time'  => $this->timestamp()->notNull(),
            'how_long'       => $this->string()->notNull(),
            'color_status'   => $this->string()->defaultValue('process')->notNull(),
            'content'        => $this->string()->notNull(),
            'created_by'     => $this->integer()->notNull(),
            'updated_by'     => $this->integer(),
            'created_at'     => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'     => $this->timestamp(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-road_irrigation_tasks-road_id}}',
            '{{%road_irrigation_tasks}}',
            'road_id'
        );

        // add foreign key for table `{{%road}}`
        $this->addForeignKey(
            '{{%fk-road_irrigation_tasks-road_id}}',
            '{{%road_irrigation_tasks}}',
            'road_id',
            '{{%road}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-road_irrigation_tasks-created_by}}',
            '{{%road_irrigation_tasks}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-road_irrigation_tasks-created_by}}',
            '{{%road_irrigation_tasks}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-road_irrigation_tasks-updated_by}}',
            '{{%road_irrigation_tasks}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-road_irrigation_tasks-updated_by}}',
            '{{%road_irrigation_tasks}}',
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
        // drops foreign key for table `{{%road}}`
        $this->dropForeignKey(
            '{{%fk-road_irrigation_tasks-road_id}}',
            '{{%road_irrigation_tasks}}'
        );

        // drops index for column `road_id`
        $this->dropIndex(
            '{{%idx-road_irrigation_tasks-road_id}}',
            '{{%road_irrigation_tasks}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-road_irrigation_tasks-created_by}}',
            '{{%road_irrigation_tasks}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-road_irrigation_tasks-created_by}}',
            '{{%road_irrigation_tasks}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-road_irrigation_tasks-updated_by}}',
            '{{%road_irrigation_tasks}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-road_irrigation_tasks-updated_by}}',
            '{{%road_irrigation_tasks}}'
        );

        $this->dropTable('{{%road_irrigation_tasks}}');
    }
}
