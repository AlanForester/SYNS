<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_150539_add_insert_data_to_mark_table extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%mark}}", [
            'id',
            'title',
            'science_by',
            'status',
            'created_at',
            'created_by'
        ],[[
            1,
            0,
            'Математика',
            true,
            time(),
            'alexcollin'
        ],[
            2,
            "Точка",
            'Геометрия',
            true,
            time(),
            'alexcollin'
        ],[
            3,
            "Начало",
            'Философия',
            true,
            time(),
            'alexcollin'
        ]]);
    }

    public function down()
    {
        echo "m150827_150539_add_insert_data_to_mark_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
