<?php

use yii\db\Migration;
use yii\db\Expression;

class m150827_150551_add_insert_data_to_tract_table extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%chain}}",[
            'id',
            'scheme_by',
            'status',
            'science_by',
            'essence_by',
            'implement_of',
            'implement_rank',
            'engine_of',
            'engine_rank',
            'generation_to',
            'generation_rank',
            'disintegration_to',
            'disintegration_rank',
        ],[[
            1,
            0,
            true,
            "Математика",
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
        ],[
            2,
            0,
            true,
            "Геометрия",
            "Точка",
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
        ],[
            3,
            0,
            true,
            "Философия",
            "Начало",
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
            new Expression('NULL'),
            0,
        ]]);

    }

    public function down()
    {
        echo "m150827_150551_add_insert_data_to_tract_table cannot be reverted.\n";

        return false;
    }



}
