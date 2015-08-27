<?php

use yii\db\Migration;

class m150827_150530_add_insert_data_to_pattern_table extends Migration
{
    public function up()
    {
        $this->insert("{{%pattern}}",[
            'id' => 1,
            'measure' => 0,
            'degree' => 1,
            'x' => 0,
            'y' => 0,
            'z' => 0,
            'angle_x' => 0,
            'angle_y' => 0,
            'angle_z' => 0,
            'release' => 0,
            'gravity' => 0,
            'freq' => 0,
            'flex' => 0,
            'twist' => 0,
            'length' => 0,
            'size' => 0,
            'weight' => 0,
        ]);

        $this->insert("{{%pattern}}",[
            'id' => 2,
            'measure' => 1,
            'degree' => 1,
            'x' => 1,
            'y' => 0,
            'z' => 0,
            'angle_x' => 0,
            'angle_y' => 0,
            'angle_z' => 0,
            'release' => 0,
            'gravity' => 0,
            'freq' => 0,
            'flex' => 0,
            'twist' => 0,
            'length' => 0,
            'size' => 0,
            'weight' => 0,
        ]);

        $this->insert("{{%pattern}}",[
            'id' => 3,
            'measure' => 2,
            'degree' => 1,
            'x' => 0,
            'y' => 1,
            'z' => 0,
            'angle_x' => 0,
            'angle_y' => 0,
            'angle_z' => 0,
            'release' => 0,
            'gravity' => 0,
            'freq' => 0,
            'flex' => 0,
            'twist' => 0,
            'length' => 0,
            'size' => 0,
            'weight' => 0,
        ]);
    }

    public function down()
    {

    }

}
