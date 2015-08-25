<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Migration;
use yii\db\Expression;

class m150615_092929_insert_to_user extends Migration
{
    public function up()
    {
        $this->insert("{{%user}}",[
            'login' => 'alexcollin',
            'email' => 'alex@collin.su',
            'phone' => '79065156927',
            'name' => 'Алекс',
            'surname' => 'Коллин',
            'last_name' => 'Игоревич',
            'birthday' => 631670400,
            'country' => 'Россия',
            'zone' => 'Ивановская область',
            'city' => 'Иваново',
            'area' => new Expression('NULL'),
            'street' => new Expression('NULL'),
            'build' => new Expression('NULL'),
            'flat' => new Expression('NULL'),
            'auth_key' => 'rfHtB0zORDIrSuxSlayAkSwybi5wmEvl',
            'password_hash' => '$2y$13$M2lSPmPT.68uOJt0LLBO/OuU1soQEbBcSEGENYrvLkDaK8K053wMW',
            'password_reset_token' => new Expression('NULL'),
            'rating' => 0,
            'status' => true,
            'created_at' => new Expression('NOW'),
            'updated_at' => new Expression('NOW'),
        ]);
    }

    public function down()
    {
        $this->delete("{{%user}}");
    }

}
