<?php

use yii\db\Migration;

/**
 * Class m180416_114824_initDataNote
 */
class m180416_114824_initDataNote extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->batchInsert('note',['text','creator_id'],[
            [
                'Идейные соображения высшего порядка, test а также новая модель организационной деятельности.',
                2
            ],
            [
                'Безусловно, сплоченность команды профессионалов test однозначно определяет каждого участника.',
                1
            ],
            [
                'Сложно сказать, почему интерактивные прототипы своевременно test верифицированы. С другой стороны.',
                3
            ],
            [
                'С другой стороны, дальнейшее развитие различных форм деятельности test в значительной степени.',
                1
            ],
            [
                'Значимость этих проблем настолько очевидна, что сплоченность команды test профессионалов однозначно.',
                4
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('note',"text LIKE '%test%'");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_114824_initDataNote cannot be reverted.\n";

        return false;
    }
    */
}
