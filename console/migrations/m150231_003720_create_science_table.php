<?php
/**
 * Date: 06.05.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150231_003720_create_science_table
 *
 * Таблица для хранения слоев структур эволюции
 * именуется как таблица наук
 */
class m150231_003720_create_science_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%science}}",[
            'id' => Schema::TYPE_DOUBLE . ' NOT NULL',
            /*
             * Название науки
             */
            'title' => Schema::TYPE_STRING . ' NOT NULL COLLATE utf8_unicode_ci',
            /*
             * Код языка сущности
             */
            'lang_code' => Schema::TYPE_STRING . '(5) NOT NULL',
            /*
             * Описание науки
             */
            'description' => Schema::TYPE_TEXT . ' NULL DEFAULT ""',
            /*
             * Рейтинг науки
             */
            'rating' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            /*
             * Статус включенности науки
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            /*
             * Время создания науки
             */
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            /*
             * Пользователь создавший науку
             */
            'created_by' => Schema::TYPE_STRING . ' NOT NULL'
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%science}}',[
            'id',
        ]);

        $this->createIndex('science',"{{%science}}",[
            'title',
            'lang_code'
        ],true);


        $this->addForeignKey("science_created","{{%science}}",[
            'created_by',
        ],"{{%user}}",[
            'login'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('science_lang','{{%science}}',[
            'lang_code',
        ],'{{%language}}', [
            'language_id'
        ],'RESTRICT','CASCADE');
    }

    public function down()
    {
        $this->dropTable("{{%science}}");
    }

}
