<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_075505_create_language_source_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%language_source}}', [
            'id' => $this->bigPrimaryKey()->notNull(),
            'category' => $this->string(32),
            'message' => $this->text(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%language_source}}');
    }

}
