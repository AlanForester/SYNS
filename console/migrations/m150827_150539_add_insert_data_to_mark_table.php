<?php

use yii\db\Migration;

class m150827_150539_add_insert_data_to_mark_table extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%mark}}", [
            'id',
            'title',
            'lang_id',
            'pattern_id',
            'description',
            'image',
            'status',
            'rating',
            'is_supply',
            'created_at',
            'created_by'
        ],[[
            1,
            "0",
            'ru-RU',
            1,
            "Описание",
            "",
            true,
            0,
            false,
            time(),
            1
        ],[
            2,
            "1",
            'ru-RU',
            2,
            "Описание",
            "",
            true,
            0,
            false,
            time(),
            1
        ],[
            3,
            "-1",
            'ru-RU',
            3,
            "Описание",
            "",
            true,
            0,
            false,
            time(),
            1
        ]]);
    }

    public function down()
    {

    }

}
