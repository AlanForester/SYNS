<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_115109_add_fk_to_language_translate_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('language_translate_ibfk_1', '{{%language_translate}}', [
            'language'
        ], '{{%language}}', [
            'language_id'
        ], 'CASCADE', 'CASCADE');

        $this->addForeignKey('language_translate_ibfk_2', '{{%language_translate}}', [
            'id'
        ], '{{%language_source}}', [
            'id'
        ], 'CASCADE', 'CASCADE');
    }

    public function down()
    {

    }

}
