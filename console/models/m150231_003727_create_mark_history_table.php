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
 * Class m150231_003727_create_mark_history_table
 *
 * Таблица хранит историю изменения сущностей пользователями
 */
class m150231_003727_create_mark_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable("{{%mark_history}}", [
            /*
             * Идентификатор истории
             * Ссылается на название сущности
             * и язык сущности
             */
            'mark_id' => $this->double()->notNull(),
            /*
             * Изменяемый атрибут
             */
            'attribute' => $this->string()->notNull(),
            /*
             * Бывшее значение атрибута
             */
            'was_to' => $this->text()->notNull(),
            /*
             * Измененное значение атрибута
             */
            'become' => $this->text()->notNull(),
            /*
             * Время изменения атрибута
             * в TimeStamp
             */
            'updated_at' => $this->timestamp()->notNull(),
            /*
             * Пользователь изменивший атрибут
             */
            'updated_by' => $this->timestamp()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%mark_history}}", [
            'mark_id',
        ]);

        $this->addForeignKey("mark_history_mark", "{{%mark_history}}", [
            'mark_id',
        ], "{{%mark}}", [
            'id',
        ], 'RESTRICT', 'CASCADE');

        $this->addForeignKey("mark_history_updated", "{{%mark_history}}", [
            'updated_by',
        ], "{{%user}}", [
            'login'
        ], 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable("{{%mark_history}}");
    }

}
