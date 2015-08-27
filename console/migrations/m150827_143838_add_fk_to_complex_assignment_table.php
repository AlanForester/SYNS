<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_143838_add_fk_to_complex_assignment_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('complex_assignment_fk_1','{{%complex_assignment}}',[
            'complex_id',
        ],'{{%complex}}', [
            'id'
        ],'CASCADE','CASCADE');

        $this->addForeignKey('complex_assignment_fk_2','{{%complex_assignment}}',[
            'mark_id',
        ],'{{%mark}}', [
            'id'
        ],'RESTRICT','RESTRICT');

    }

    public function down()
    {

    }

}
