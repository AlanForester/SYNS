<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_075347_create_language_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%language}}', [
            'language_id' => $this->string(5)->notNull(),
            'language' => $this->string(3)->notNull(),
            'country' => $this->string(3)->notNull(),
            'name' => $this->string(32)->notNull(),
            'name_ascii' => $this->string(32)->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'sort' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->addPrimaryKey('pk',"{{%language}}",[
            'language_id'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%language}}');
    }

}
