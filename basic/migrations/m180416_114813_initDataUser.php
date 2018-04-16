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
        $this->batchInsert('user', ['username', 'name', 'password_hash'],
            [
                ['first', 'Первый', '77777'],
                ['second', 'Второй', '77777'],
                ['third', 'Третий', '77777'],
                ['last', 'Последний', '77777']
            ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user',"username IN ('first','second','third','last')");
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
