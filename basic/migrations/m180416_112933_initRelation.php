<?php

use yii\db\Migration;

/**
 * Class m180416_112933_initRelation
 */
class m180416_112933_initRelation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id']);
        $this->addForeignKey('fx_access_note', 'access', ['note_id'], 'note', ['id']);
        $this->addForeignKey('fx_note_user', 'note', ['creator_id'], 'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_access_user', 'access');
        $this->dropForeignKey('fx_access_note', 'access');
        $this->dropForeignKey('fx_note_user', 'note');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_112933_initRelation cannot be reverted.\n";

        return false;
    }
    */
}
