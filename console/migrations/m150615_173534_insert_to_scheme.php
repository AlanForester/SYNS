<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Migration;

class m150615_173534_insert_to_scheme extends Migration
{
    public function up()
    {
        $this->insert("{{%scheme}}",[
            'degree' => 0,
            'x' => 0,
            'y' => 0,
            'z' => 0,
            'angle_x_of_0' => 0,
            'angle_y_of_0' => 0,
            'angle_z_of_0' => 0,
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
        $this->delete("{{%scheme}}");
    }

}
