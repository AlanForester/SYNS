<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Migration;
use yii\db\Expression;

class m150615_185944_insert_to_chain extends Migration
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
        $this->delete("{{%chain}}");
    }

}
