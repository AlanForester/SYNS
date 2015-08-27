<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_075917_create_mark_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mark}}', [
            'id' => $this->bigInteger()->notNull(),
            /*
             * Название сущности
             * Уникально совместно с наукой
             * сущности
             */
            'title' => $this->string(255)->notNull(),
            /*
             * Код языка сущности
             */
            'lang_id' => $this->string(5)->notNull(),
            /*
             * Степень объекта в графе и ее схема
             */
            'pattern_id' => $this->bigInteger()->notNull(),
            /*
             * Описание сущности
             * Временное поле
             * В дальнейшем генирируется автоматически
             */
            'description' => $this->text(),
            /*
             * Представление сущности в
             * виде изображения
             */
            'image' => $this->text(),
            /*
             * Статус включенности сущности
             */
            'status' => $this->boolean()->notNull(),
            /*
             * Рейтинг сущности
             */
            'rating' => $this->bigInteger(),
            /*
             * Это предложение вариации
             */
            'is_supply' => $this->boolean()->notNull(),
            /*
             * Время создания сущности
             * в TimeStamp
             */
            'created_at' => $this->timestamp(),
            /*
             * Создатель сущности
             * ссылается на пользователя
             */
            'created_by' => $this->bigInteger(),
        ], $tableOptions);

        $this->addPrimaryKey('pk','{{%mark}}',[
            'id',
        ]);

        $this->createIndex('mark','{{%mark}}',[
            'title',
            'lang_id'
        ],true);

    }

    public function down()
    {
        $this->dropTable('{{%mark}}');
    }
}
