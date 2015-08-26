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
            'description' => $this->text()->notNull(),
            /*
             * Представление сущности в
             * виде изображения
             */
            'image' => $this->text()->notNull(),
            /*
             * Статус включенности сущности
             */
            'status' => $this->boolean()->notNull(),
            /*
             * Рейтинг сущности
             */
            'rating' => $this->bigInteger()->notNull(),
            /*
             * Время создания сущности
             * в TimeStamp
             */
            'created_at' => $this->timestamp(),
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

    }

    public function down()
    {
        $this->dropTable('{{%mark}}');
    }
}
