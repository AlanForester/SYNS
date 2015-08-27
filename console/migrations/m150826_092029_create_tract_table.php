<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_092029_create_tract_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%tract}}",[
            'id' => $this->bigInteger()->notNull(),
            'alpha_by' => $this->bigInteger()->notNull(),
            'omega_by' => $this->bigInteger()->notNull(),
            'process_by' => $this->bigInteger()->notNull(),
            'rating' => $this->bigInteger()->notNull(),
            'is_supply' => $this->boolean()->notNull(),
            'created_at' => $this->timestamp(),
            'created_by' => $this->string(255),
            'status' => $this->boolean(),
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%tract}}',[
            'id',
        ]);

        $this->createIndex('tract','{{%tract}}',[
            'alpha_by',
            'omega_by',
            'process_by'
        ],true);
    }

    public function down()
    {
        $this->dropTable("{{%tract}}");
    }

}
