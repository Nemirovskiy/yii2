<?php

use yii\db\Migration;

/**
 * Class m180415_195130_init
 */
class m180415_195130_init extends Migration
{
    /**
     * {@inheritdoc}
     *
     * CREATE TABLE `user` (
     * `id` INT NOT NULL AUTO_INCREMENT,
     * `username` VARCHAR(255) NOT NULL,
     * `name` VARCHAR(255) NOT NULL,
     * `surname` VARCHAR(255) NULL,
     * `password_hash` VARCHAR(255) NOT NULL,
     * `access_token` VARCHAR(255) NULL DEFAULT NULL,
     * `auth_key` VARCHAR(255) NULL DEFAULT NULL,
     * `created_at` INT NULL,
     * `updated_at` INT NULL,
     * PRIMARY KEY (`id`)
     * );
     * CREATE TABLE `note` (
     * `id` INT NOT NULL AUTO_INCREMENT,
     * `text` TEXT NOT NULL,
     * `creator_id` INT NOT NULL,
     * `created_at` INT NULL,
     * PRIMARY KEY (`id`)
     * );
     * CREATE TABLE `access` (
     * `id` INT NOT NULL AUTO_INCREMENT,
     * `note_id` INT NOT NULL,
     * `user_id` INT NOT NULL,
     * PRIMARY KEY (`id`)
     * )
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
        $this->createTable(
            "note",
            [
                "id" => $this->primaryKey(),
                "text" => $this->text(),
                "creator_id" => $this->integer()->notNull(),
                "created_at" => $this->integer()
            ]
        );
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
        $this->dropTable("user");
        $this->dropTable("note");
        $this->dropTable("access");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180415_195130_init cannot be reverted.\n";

        return false;
    }
    */
}
