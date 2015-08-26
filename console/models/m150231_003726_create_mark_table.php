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
            'id' => $this->double()->notNull(),
            /*
             * Название сущности
             * Уникально совместно с наукой
             * сущности
             */
            'title' => $this->string(255)->notNull(),
            /*
             * Код языка сущности
             */
            'lang_code' => $this->string(5)->notNull(),
            /*
             * Описание сущности
             * Временное поле
             * В дальнейшем генирируется автоматически
             */
            'description' => $this->text()->notNull()->defaultValue(""),
            /*
             * Представление сущности в
             * виде изображения
             */
            'image' => $this->text()->notNull()->defaultValue(""),
            /*
             * Статус включенности сущности
             */
            'status' => $this->boolean()->notNull()->defaultValue(1),
            /*
             * Рейтинг сущности
             */
            'rating' => $this->bigInteger()->notNull()->defaultValue(0),
            /*
             * Время создания сущности
             * в TimeStamp
             */
            'created_at' => $this->timestamp()->defaultValue("NOW()"),
            /*
             * Создатель сущности
             * ссылается на пользователя
             */
            'created_by' => $this->string(255)->notNull(),
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