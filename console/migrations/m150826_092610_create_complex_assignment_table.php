<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_092610_create_complex_assignment_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%complex_assignment}}",[
            'complex_id' => $this->bigInteger()->notNull(),
            'mark_id' => $this->bigInteger()->notNull(),
            'status' => $this->boolean()->notNull(),
            'rating' => $this->bigInteger()->notNull()
        ],$tableOptions);

        $this->createIndex('complex_assignment','{{%complex_assignment}}',[
            'complex_id',
            'mark_id'
        ]);
    }

    public function down()
    {
       $this->dropTable("{{%complex_assignment}}");
    }

}
