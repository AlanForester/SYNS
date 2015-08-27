<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_092635_create_request_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%request}}",[
            'id' => $this->bigInteger()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'email' => $this->string(),
            'image' => $this->string(),
            'rating' => $this->bigInteger(),
            'approved_at' => $this->timestamp(),
            'created_at' => $this->timestamp(),
            'created_by' => $this->bigInteger(),
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%request}}',[
            'id',
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%request}}");
    }
}
