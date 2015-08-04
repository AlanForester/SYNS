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
 * Class m150231_003731_create_essence_table
 *
 * Таблица для хранения сущностей
 */
class m150231_003731_create_essence_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%essence}}', [
            'id' => Schema::TYPE_DOUBLE . ' NOT NULL',
            /*
             * Название сущности
             * Уникально совместно с наукой
             * сущности
             */
            'title' => Schema::TYPE_STRING . ' NOT NULL COLLATE utf8_unicode_ci',
            /*
             * Наука сущности
             */
            'science_by' => Schema::TYPE_STRING . ' NOT NULL',
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

        $this->addPrimaryKey('pk','{{%essence}}',[
            'id',
        ]);

        $this->createIndex('essence','{{%essence}}',[
            'title',
            'science_by'
        ],true);



        $this->addForeignKey('essence_created','{{%essence}}',[
            'created_by',
        ],'{{%user}}', [
            'login'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('essence_science','{{%essence}}',[
            'science_by',
        ],'{{%science}}', [
            'title'
        ],'RESTRICT','CASCADE');


    }

    public function down()
    {
        $this->dropTable('{{%essence}}');
    }
}