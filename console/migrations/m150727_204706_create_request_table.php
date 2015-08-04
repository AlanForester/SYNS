<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Schema;
use yii\db\Migration;

class m150727_204706_create_request_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%request}}",[
            'id' => Schema::TYPE_PK . " NOT NULL AUTO_INCREMENT",
            'message' => Schema::TYPE_TEXT . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'image' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'title' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'rank' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'chain_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'approved_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'created_by' => Schema::TYPE_STRING . ' NOT NULL'
        ],$tableOptions);

        $this->addForeignKey('request_created','{{%request}}',[
            'created_by',
        ],'{{%user}}', [
            'login'
        ],'RESTRICT','CASCADE');
    }

    public function down()
    {
        $this->dropTable("{{%request}}");
    }

}
