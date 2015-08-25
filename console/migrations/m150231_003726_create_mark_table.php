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
 * Class m150231_003726_create_mark_table
 *
 * Таблица для хранения сущностей
 */
class m150231_003726_create_mark_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mark}}', [
            'id' => Schema::TYPE_DOUBLE . ' NOT NULL',
            /*
             * Название сущности
             * Уникально совместно с наукой
             * сущности
             */
            'title' => Schema::TYPE_STRING . ' NOT NULL COLLATE utf8_unicode_ci',
            /*
             * Код языка сущности
             */
            'lang_code' => $this->string(5) . ' NOT NULL',
            /*
             * Описание сущности
             * Временное поле
             * В дальнейшем генирируется автоматически
             */
            'description' => Schema::TYPE_TEXT . ' NULL DEFAULT ""',
            /*
             * Представление сущности в
             * виде изображения
             */
            'image' => Schema::TYPE_TEXT . ' NULL DEFAULT ""',
            /*
             * Статус включенности сущности
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            /*
             * Рейтинг сущности
             */
            'rating' => Schema::TYPE_BIGINT . ' NOT NULL DEFAULT 0',
            /*
             * Время создания сущности
             * в TimeStamp
             */
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            /*
             * Создатель сущности
             * ссылается на пользователя
             */
            'created_by' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

        $this->addPrimaryKey('pk','{{%mark}}',[
            'id',
        ]);

        $this->createIndex('mark','{{%mark}}',[
            'title',
            'lang_code'
        ],true);



        $this->addForeignKey('mark_created','{{%mark}}',[
            'created_by',
        ],'{{%user}}', [
            'login'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('mark_lang','{{%mark}}',[
            'lang_code',
        ],'{{%language}}', [
            'language_id'
        ],'RESTRICT','CASCADE');


    }

    public function down()
    {
        $this->dropTable('{{%mark}}');
    }
}