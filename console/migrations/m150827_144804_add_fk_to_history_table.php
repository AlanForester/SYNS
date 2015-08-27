<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_144804_add_fk_to_history_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('history_fk_1','{{%history}}',[
            'updated_by',
        ],'{{%user}}', [
            'id'
        ],'SET NULL','CASCADE');
    }

    public function down()
    {

    }

}
