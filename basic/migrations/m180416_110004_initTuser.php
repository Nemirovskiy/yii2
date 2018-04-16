<?php

use yii\db\Migration;

/**
 * Class m180416_114004_initTuser
 */
class m180416_110004_initTuser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            "user",
            [
                "id"            => $this->primaryKey(),
                "username"      => $this->string(255)->notNull(),
                "name"          => $this->string(255)->notNull(),
                "surname"       => $this->string(255),
                "password_hash" => $this->string(255)->notNull(),
                "access_token"  => $this->string(255)->defaultValue(null),
                "auth_key"      => $this->string(255)->defaultValue(null),
                "created_at"    => $this->integer(),
                "updated_at"    => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("user");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_110004_initTuser cannot be reverted.\n";

        return false;
    }
    */
}
