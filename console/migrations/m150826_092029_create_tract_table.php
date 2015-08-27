<?php

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
            'alpha_id' => $this->bigInteger()->notNull(),
            'omega_id' => $this->bigInteger()->notNull(),
            'process_id' => $this->bigInteger()->notNull(),
            'rating' => $this->bigInteger()->notNull(),
            'is_supply' => $this->boolean()->notNull(),
            'created_at' => $this->timestamp(),
            'created_by' => $this->bigInteger(),
            'status' => $this->boolean(),
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%tract}}',[
            'id',
        ]);

        $this->createIndex('tract','{{%tract}}',[
            'alpha_id',
            'omega_id',
            'process_id'
        ],true);
    }

    public function down()
    {
        $this->dropTable("{{%tract}}");
    }

}
