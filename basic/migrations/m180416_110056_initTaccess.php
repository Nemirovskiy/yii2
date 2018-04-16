<?php

use yii\db\Migration;

/**
 * Class m180416_114056_initTaccess
 */
class m180416_110056_initTaccess extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            "access",
            [
                "id" => $this->primaryKey(),
                "note_id" => $this->integer()->notNull(),
                "user_id" => $this->integer()->notNull()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("access");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_114056_initTaccess cannot be reverted.\n";

        return false;
    }
    */
}
