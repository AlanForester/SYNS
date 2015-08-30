<?php

use yii\db\Schema;
use yii\db\Migration;

class m150830_095127_add_oauth2_server extends Migration
{


    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%oauth_clients}}', [
            'client_id' => Schema::TYPE_STRING . '(32) NOT NULL',
            'client_secret' => Schema::TYPE_STRING . '(32) DEFAULT NULL',
            'redirect_uri' => Schema::TYPE_STRING . '(1000) NOT NULL',
            'grant_types' => Schema::TYPE_STRING . '(100) NOT NULL',
            'scope' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
            'user_id' => Schema::TYPE_BIGINT . ' DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%oauth_clients}}", [
            'client_id'
        ]);

        $this->createTable('{{%oauth_access_tokens}}', [
            'access_token' => Schema::TYPE_STRING . '(40) NOT NULL',
            'client_id' => Schema::TYPE_STRING . '(32) NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'expires' => $this->timestamp(),
            'scope' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%oauth_access_tokens}}", [
            'access_token'
        ]);

        $this->addForeignKey('oauth_access_tokens_client_id_fk_1', "{{%oauth_access_tokens}}", [
            'client_id'
        ], "{{%oauth_clients}}", [
            'client_id'
        ], "CASCADE", "CASCADE");

        $this->createTable('{{%oauth_refresh_tokens}}', [
            'refresh_token' => Schema::TYPE_STRING . '(40) NOT NULL',
            'client_id' => Schema::TYPE_STRING . '(32) NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'expires' => $this->timestamp(),
            'scope' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%oauth_refresh_tokens}}", [
            'refresh_token'
        ]);

        $this->addForeignKey('oauth_refresh_tokens_client_id_fk_1', "{{%oauth_refresh_tokens}}", [
            'client_id'
        ], "{{%oauth_clients}}", [
            'client_id'
        ], "CASCADE", "CASCADE");

        $this->createTable('{{%oauth_authorization_codes}}', [
            'authorization_code' => Schema::TYPE_STRING . '(40) NOT NULL',
            'client_id' => Schema::TYPE_STRING . '(32) NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'redirect_uri' => Schema::TYPE_STRING . '(1000) NOT NULL',
            'expires' => $this->timestamp(),
            'scope' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%oauth_authorization_codes}}", [
            'authorization_code'
        ]);

        $this->addForeignKey('oauth_authorization_codes_client_id_fk_1', "{{%oauth_authorization_codes}}", [
            'client_id'
        ], "{{%oauth_clients}}", [
            'client_id'
        ], "CASCADE", "CASCADE");

        $this->createTable('{{%oauth_scopes}}', [
            'scope' => Schema::TYPE_STRING . '(2000) NOT NULL',
            'is_default' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%oauth_jwt}}', [
            'client_id' => Schema::TYPE_STRING . '(32) NOT NULL',
            'subject' => Schema::TYPE_STRING . '(80) DEFAULT NULL',
            'public_key' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%oauth_jwt}}", [
            'client_id'
        ]);

        $this->createTable('{{%oauth_users}}', [
            'username' => Schema::TYPE_STRING . '(255) NOT NULL',
            'password' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
            'first_name' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'last_name' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey("pk", "{{%oauth_users}}", [
            'username'
        ]);

        $this->createTable('{{%oauth_public_keys}}', [
            'client_id' => Schema::TYPE_STRING . '(255) NOT NULL',
            'public_key' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
            'private_key' => Schema::TYPE_STRING . '(2000) DEFAULT NULL',
            'encryption_algorithm' => Schema::TYPE_STRING . '(100) DEFAULT \'RS256\'',
        ], $tableOptions);

        $this->batchInsert('{{%oauth_clients}}', ['client_id', 'client_secret', 'redirect_uri', 'grant_types'], [
            ['testclient', 'testpass', 'http://fake/', 'client_credentials authorization_code password implicit'],
        ]);

        return true;
    }

    public function down()
    {
        $transaction = $this->db->beginTransaction();
        $this->dropTable('{{%oauth_users}}');
        $this->dropTable('{{%oauth_jwt}}');
        $this->dropTable('{{%oauth_scopes}}');
        $this->dropTable('{{%oauth_authorization_codes}}');
        $this->dropTable('{{%oauth_refresh_tokens}}');
        $this->dropTable('{{%oauth_access_tokens}}');
        $this->dropTable('{{%oauth_public_keys}}');
        $this->dropTable('{{%oauth_clients}}');
        $transaction->commit();

        return true;
    }
}
