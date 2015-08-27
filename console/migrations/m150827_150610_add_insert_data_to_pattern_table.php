<?php

use yii\db\Schema;
use yii\db\Migration;

class m150827_150610_add_insert_data_to_pattern_table extends Migration
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
        echo "m150827_150610_add_insert_data_to_pattern_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
