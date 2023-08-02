<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%road_task}}`.
 */
class m230801_100157_create_road_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%road_task}}', [
            'id'             => $this->primaryKey(),
            'road_id'        => $this->integer(),
            'start_time'     => $this->string()->notNull(),
            'end_time'       => $this->string()->notNull(),
            'status'         => $this->smallInteger()->defaultValue(1)->notNull(),
            'status_color'   => $this->smallInteger()->defaultValue(1)->notNull(),
            'description'    => $this->string(),
            'content'        => $this->string(),
            'created_by'     => $this->integer()->notNull(),
            'updated_by'     => $this->integer(),
            'created_at'     => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'     => $this->timestamp(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-road_task-road_id}}',
            '{{%road_task}}',
            'road_id'
        );

        // add foreign key for table `{{%road}}`
        $this->addForeignKey(
            '{{%fk-road_task-road_id}}',
            '{{%road_task}}',
            'road_id',
            '{{%road}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-road_task-created_by}}',
            '{{%road_task}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-road_task-created_by}}',
            '{{%road_task}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-road_task-updated_by}}',
            '{{%road_task}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-road_task-updated_by}}',
            '{{%road_task}}',
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
            '{{%fk-road_task-road_id}}',
            '{{%road_task}}'
        );

        // drops index for column `road_id`
        $this->dropIndex(
            '{{%idx-road_task-road_id}}',
            '{{%road_task}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-road_task-created_by}}',
            '{{%road_task}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-road_task-created_by}}',
            '{{%road_task}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-road_task-updated_by}}',
            '{{%road_task}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-road_task-updated_by}}',
            '{{%road_task}}'
        );

        $this->dropTable('{{%road_task}}');
    }
}
