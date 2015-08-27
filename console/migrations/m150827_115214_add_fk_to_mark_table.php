<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_115214_add_fk_to_mark_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('mark_fk_1','{{%mark}}',[
            'pattern_id',
        ],'{{%pattern}}', [
            'id'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('mark_fk_2','{{%mark}}',[
            'created_by',
        ],'{{%user}}', [
            'id'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('mark_fk_3','{{%mark}}',[
            'lang_id',
        ],'{{%language}}', [
            'language_id'
        ],'RESTRICT','CASCADE');
    }

    public function down()
    {

    }

}
