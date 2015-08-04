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
 * Class m150231_003725_create_science_history_table
 *
 * Таблица хранит историю изменений наук пользователями
 */
class m150231_003725_create_science_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable("{{%science_history}}",[
            /*
             * Идентификатор истории
             * Ссылается на название науки
             * и язык сущности
             */
            'science' => Schema::TYPE_STRING . ' NOT NULL',
            /*
            * Ссылка на язык
            */
            'lang_code' => Schema::TYPE_STRING . ' NOT NULL',
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
        ],$tableOptions);

        $this->addPrimaryKey("pk","{{%science_history}}",[
            'science',
            'lang_code'
        ]);

        $this->addForeignKey("science_history_science","{{%science_history}}",[
            'science',
            'lang_code'
        ],"{{%science}}",[
            'title',
            'lang_code'
        ]);

        $this->addForeignKey("lang_code_history_science","{{%science_history}}",[
            'lang_code',
        ],"{{%science}}",[
            'lang_code'
        ]);

        $this->addForeignKey("science_history_updated","{{%science_history}}",[
            'updated_by',
        ],"{{%user}}",[
            'login'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%science_history}}");
    }

}
