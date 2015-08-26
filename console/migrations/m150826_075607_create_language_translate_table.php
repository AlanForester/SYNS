<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_075607_create_language_translate_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%language_translate}}', [
            'id' => $this->bigInteger()->notNull(),
            'language' => $this->string(5)->notNull(),
            'translation' => $this->text(),
        ], $tableOptions);

        $this->addPrimaryKey('pk',"{{%language_translate}}",[
            'id',
            'language'
        ]);

        $this->createIndex('language_translate_idx_language', '{{%language_translate}}', 'language');

    }

    public function down()
    {
        $this->dropTable('{{%language_translate}}');
    }

}
