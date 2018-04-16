<?php

use yii\db\Migration;

/**
 * Class m180416_114015_initTnote
 */
class m180416_110015_initTnote extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            "note",
            [
                "id" => $this->primaryKey(),
                "text" => $this->text(),
                "creator_id" => $this->integer()->notNull(),
                "created_at" => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("note");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_110015_initTnote cannot be reverted.\n";

        return false;
    }
    */
}
