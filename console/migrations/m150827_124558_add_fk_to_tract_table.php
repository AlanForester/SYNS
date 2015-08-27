<?php

use yii\db\Migration;

class m150827_124558_add_fk_to_tract_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('tract_fk_1','{{%tract}}',[
            'alpha_id',
        ],'{{%mark}}', [
            'id'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('tract_fk_2','{{%tract}}',[
            'omega_id',
        ],'{{%mark}}', [
            'id'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('tract_fk_3','{{%tract}}',[
            'process_id',
        ],'{{%process}}', [
            'id'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('tract_fk_4','{{%tract}}',[
            'created_by',
        ],'{{%user}}', [
            'id'
        ],'RESTRICT','CASCADE');
    }

    public function down()
    {

    }

}
