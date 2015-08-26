<?php

use yii\db\Schema;
use yii\db\Migration;

class m150231_003733_create_process_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%process}}",[
            'label' => $this->string(255)->notNull(),
            'description' => $this->text()->defaultValue(""),
            'status' => $this->boolean()->defaultValue(1),
        ],$tableOptions);
    }

    public function down()
    {
        $this->dropTable("{{%process}}");
    }

}
