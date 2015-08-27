<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_143708_add_fk_to_complex_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('complex_fk_1','{{%complex}}',[
            'created_by',
        ],'{{%user}}', [
            'id'
        ],'RESTRICT','CASCADE');
    }

    public function down()
    {

    }

}
