<?php

use yii\db\Migration;

class m150827_150551_add_insert_data_to_tract_table extends Migration
{
    public function up()
    {
        $this->batchInsert("{{%tract}}",[
            'id',
            'alpha_id' ,
            'omega_id',
            'process_id',
            'rating',
            'is_supply',
            'created_at' ,
            'created_by',
            'status',
        ],[[
            1,
            1,
            2,
            1,
            0,
            false,
            time(),
            1,
            true,
        ],[
            2,
            1,
            3,
            2,
            0,
            false,
            time(),
            1,
            true,
        ]]);

    }

    public function down()
    {

    }



}
