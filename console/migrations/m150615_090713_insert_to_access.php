<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Schema;
use yii\db\Migration;

class m150615_090713_insert_to_access extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%access}}", [
            'id',
            'title',
            'description',
            'status',
            'global_accept'
        ], [[
            10,
            "Администратор",
            "Администратор имеющий доступ ко всем функциям без ограничений",
            true,
            true
        ], [
            100,
            "Доверенный пользователь",
            "Доверенный пользователь системы",
            true,
            true,
        ], [
            110,
            "Пользователь",
            "Активен",
            true,
            false
        ] , [
            120,
            "Заблокированный пользователь",
            "Заблокирован",
            true,
            false
        ]]);

    }

    public function down()
    {
        $this->delete("{{%access}}");
    }

}
