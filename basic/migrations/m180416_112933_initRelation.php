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
        $this->db->createCommand()->addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id'])->execute();
        $this->db->createCommand()->addForeignKey('fx_access_note', 'access', ['note_id'], 'note', ['id'])->execute();
        $this->db->createCommand()->addForeignKey('fx_note_user', 'note', ['creator_id'], 'user', ['id'])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->db->createCommand()->dropForeignKey('fx_access_user', 'access')->execute();
        $this->db->createCommand()->dropForeignKey('fx_access_note', 'access')->execute();
        $this->db->createCommand()->dropForeignKey('fx_note_user', 'note')->execute();
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
