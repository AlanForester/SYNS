<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_144558_add_fk_to_request_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('request_fk_1','{{%request}}',[
            'created_by',
        ],'{{%user}}', [
            'id'
        ],'SET NULL','CASCADE');
    }

    public function down()
    {

    }

}
