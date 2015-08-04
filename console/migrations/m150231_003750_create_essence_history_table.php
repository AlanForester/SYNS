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

/**
 * Class m150231_003750_create_essence_history_table
 *
 * Таблица хранит историю изменения сущностей пользователями
 */
class m150231_003750_create_essence_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable("{{%essence_history}}", [
            /*
             * Идентификатор истории
             * Ссылается на название сущности
             * и язык сущности
             */
            'essence_id' => Schema::TYPE_DOUBLE . ' NOT NULL',
            /*
             * Изменяемый атрибут
             */
            'attribute' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Бывшее значение атрибута
             */
            'was_to' => Schema::TYPE_TEXT . ' NOT NULL',
            /*
             * Измененное значение атрибута
             */
            'become' => Schema::TYPE_TEXT . ' NOT NULL',
            /*
             * Время изменения атрибута
             * в TimeStamp
             */
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            /*
             * Пользователь изменивший атрибут
             */
            'updated_by' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%essence_history}}", [
            'essence_id',
        ]);

        $this->addForeignKey("essence_history_essence", "{{%essence_history}}", [
            'essence_id',
        ], "{{%essence}}", [
            'id',
        ], 'RESTRICT', 'CASCADE');

        $this->addForeignKey("essence_history_updated", "{{%essence_history}}", [
            'updated_by',
        ], "{{%user}}", [
            'login'
        ], 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable("{{%essence_history}}");
    }

}
