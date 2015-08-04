<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Migration;

class m150615_142304_insert_to_essence extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%essence}}", [
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
        $this->delete("{{%essence}}");
    }

}
