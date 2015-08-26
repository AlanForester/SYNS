<?php

use yii\db\Schema;
use yii\db\Migration;

class m150231_003734_create_synergy_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%synergy}}",[
            'label' => $this->string(255)->notNull(),
            'description' => $this->text()->defaultValue(""),
            'range' => $this->text()->notNull(),
        ],$tableOptions);
    }

    public function down()
    {
        $this->dropTable("{{%synergy}}");
    }

}
