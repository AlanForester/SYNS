<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_080254_create_mark_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable("{{%mark_history}}", [
            /*
             * Идентификатор истории
             * Ссылается на название сущности
             * и язык сущности
             */
            'mark_id' => $this->double()->notNull(),
            /*
             * Изменяемый атрибут
             */
            'attribute' => $this->string()->notNull(),
            /*
             * Бывшее значение атрибута
             */
            'was_to' => $this->text()->notNull(),
            /*
             * Измененное значение атрибута
             */
            'become' => $this->text()->notNull(),
            /*
             * Время изменения атрибута
             * в TimeStamp
             */
            'updated_at' => $this->timestamp()->notNull(),
            /*
             * Пользователь изменивший атрибут
             */
            'updated_by' => $this->timestamp()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%mark_history}}", [
            'mark_id',
        ]);

    }

    public function down()
    {
        $this->dropTable("{{%mark_history}}");
    }
}
