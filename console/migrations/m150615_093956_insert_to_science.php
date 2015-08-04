<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Migration;

class m150615_093956_insert_to_science extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%science}}", [
            'title',
            'lang_code',
            'description',
            'rating',
            'status',
            'created_at',
            'created_by',
        ], [[
            'Математика',
            'RU',
            'Представление структур, порядков и отношений',
            0,
            true,
            time(),
            'alexcollin',
        ], [
            'Аргебра',
            'RU',
            'Представление операций над элементами множества произвольной природы',
            0,
            true,
            time(),
            'alexcollin',
        ], [
            'Геометрия',
            'RU',
            'Представление пространственных структур, отношения и их обобщения',
            0,
            true,
            time(),
            'alexcollin',
        ], [
            'Философия',
            'RU',
            'Представление природы сознания, а также соотношение сознания и физической реальности (тела)',
            0,
            true,
            time(),
            'alexcollin',
        ], [
            'Физика',
            'RU',
            'Материальное представление.',
            0,
            true,
            time(),
            'alexcollin',
        ]]);

    }

    public function down()
    {
        $this->delete("{{%science}}");
    }

}
