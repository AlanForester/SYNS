<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_143439_add_fk_to_process_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('process_fk_1','{{%process}}',[
            'created_by',
        ],'{{%user}}', [
            'id'
        ],'RESTRICT','CASCADE');
    }

    public function down()
    {

    }

}
