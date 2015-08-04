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
 * Class m150231_003940_create_chain_history_table
 *
 * Таблица хранит историю изменений эволюций пользователями
 */
class m150231_003940_create_chain_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable("{{%chain_history}}",[
            /*
             * Идентификатор истории
             * Ссылается на название науки
             * и степени эволюции
             */
            'chain_id' => Schema::TYPE_DOUBLE . ' NOT NULL',
            /*
            * Наука звена эволюции
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
        ],$tableOptions);

        $this->addPrimaryKey("pk","{{%chain_history}}",[
            'chain_id',
        ]);

        $this->addForeignKey("evolution_history_evolution","{{%chain_history}}",[
            'chain_id',
        ],"{{%chain}}",[
            'id',
        ],'RESTRICT','CASCADE');

        $this->addForeignKey("evolution_history_updated","{{%chain_history}}",[
            'updated_by',
        ],"{{%user}}",[
            'login'
        ],'RESTRICT','CASCADE');

    }

    public function down()
    {
        $this->dropTable("{{%chain_history}}");
    }
}
