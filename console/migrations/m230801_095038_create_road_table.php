<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%road}}`.
 */
class m230801_095038_create_road_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%road}}', [
            'id' => $this->primaryKey(),
            'road_name'         => $this->string()->notNull(),
            'code_name'         => $this->string()->notNull(),
            'address'           => $this->text()->notNull(),
            'coordination'      => $this->text()->notNull(),
            'enterprise_expert' => $this->text()->notNull(),
            'plot_chief'        => $this->text()->notNull(),
            'water_employee'    => $this->text()->notNull(),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull(),
            'image_url'         => $this->text(),
            'created_by'        => $this->integer()->notNull(),
            'updated_by'        => $this->integer(),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'        => $this->timestamp(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-road-created_by}}',
            '{{%road}}',
            'created_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-road-created_by}}',
            '{{%road}}',
            'created_by',
            '{{%users}}',
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
            '{{%users}}',
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
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-road-created_by}}',
            '{{%road}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-road-created_by}}',
            '{{%road}}'
        );

        // drops foreign key for table `{{%users}}`
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
