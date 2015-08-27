<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_092301_create_process_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%process}}",[
            'id' => $this->double()->notNull(),
            'label' => $this->string(255)->notNull(),
            'description' => $this->text(),
            /*
             * Рейтинг сущности
             */
            'rating' => $this->bigInteger(),
            /*
             * Время создания сущности
             * в TimeStamp
             */
            'created_at' => $this->timestamp(),
            /*
             * Создатель сущности
             * ссылается на пользователя
             */
            'created_by' => $this->string(255),
            'status' => $this->boolean(),
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%process}}',[
            'id',
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%process}}");
    }
}
