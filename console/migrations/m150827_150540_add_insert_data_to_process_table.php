<?php

use yii\db\Migration;

class m150827_150540_add_insert_data_to_process_table extends Migration
{
    public function up()
    {
        $this->insert("{{%process}}",[
            'id' => 1,
            'label' => "Рефлексия",
            'description' => "",
            'rating' => 0,
            'created_at' => time(),
            'created_by' => 1,
            'is_supply' => false,
            'status' => true,
        ]);

        $this->insert("{{%process}}",[
            'id' => 2,
            'label' => "Бездействие",
            'description' => "",
            'rating' => 0,
            'created_at' => time(),
            'created_by' => 1,
            'is_supply' => false,
            'status' => true,
        ]);
    }

    public function down()
    {

    }

}
