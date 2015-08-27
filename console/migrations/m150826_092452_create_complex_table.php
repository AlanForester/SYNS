<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_092452_create_complex_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%complex}}",[
            'id' => $this->bigInteger()->notNull(),
            'label' => $this->string(255)->notNull(),
            'description' => $this->text()->defaultValue(""),
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
            'created_by' => $this->bigInteger(),
            'status' => $this->boolean(),
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%complex}}',[
            'id',
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%complex}}");
    }
}
