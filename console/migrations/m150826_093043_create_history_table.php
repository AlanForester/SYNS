<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_093043_create_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable("{{%history}}",[
            'table' => $this->string()->notNull(),
            'attribute' => $this->string()->notNull(),
            'was_to' => $this->text()->notNull(),
            'become' => $this->text()->notNull(),
            'operation' => $this->text()->notNull(),
            'updated_at' => $this->timestamp(),
            'updated_by' => $this->bigInteger(),
        ],$tableOptions);

        $this->createIndex("history","{{%history}}",[
            'table',
            'attribute',
        ]);

    }

    public function down()
    {
        $this->dropTable("{{%history}}");
    }
}
