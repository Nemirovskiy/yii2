<?php

use yii\db\Migration;

/**
 * Class m180416_114813_initDataUser
 */
class m180416_114813_initDataUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db->createCommand()->batchInsert('user', ['username', 'name', 'password_hash'],
            [
                ['first', 'Первый', '77777'],
                ['second', 'Второй', '77777'],
                ['third', 'Третий', '77777'],
                ['last', 'Последний', '77777']
            ])->execute();
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->db->createCommand()->delete('user',"username IN ('first','second','third','last')")->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_114813_initDataUser cannot be reverted.\n";

        return false;
    }
    */
}
