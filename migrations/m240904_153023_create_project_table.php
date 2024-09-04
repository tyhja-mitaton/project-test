<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m240904_153023_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->float()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date_start' => $this->integer(),
            'date_end' => $this->integer(),
        ]);

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-project-user_id}}',
            '{{%project}}',
            'user_id',
            '{{%user}}',
            'id',
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
            '{{%fk-project-user_id}}',
            '{{%project}}'
        );

        $this->dropTable('{{%project}}');
    }
}
