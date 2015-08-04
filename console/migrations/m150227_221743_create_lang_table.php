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
 * Class m150227_221743_create_lang_table
 *
 * Таблица для хранения языков сущностей
 */
class m150227_221743_create_lang_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lang}}', [
            /*
             * Код страны и языка
             * Например RU - Русский язык - Россия
             */
            'code' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Полное название языка
             */
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             *  Изображение флага страны
             */
            'flag' => Schema::TYPE_TEXT . ' NULL DEFAULT ""',
            /*
             * Рейтинг языка
             */
            'rating' => Schema::TYPE_BIGINT . ' NOT NULL DEFAULT 0',
            /*
             * Статус активности для языка
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ], $tableOptions);

        $this->addPrimaryKey('pk','{{%lang}}',[
            'code',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%lang}}');
    }
}
