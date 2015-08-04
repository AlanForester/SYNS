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

/**
 * Class m150101_333333_create_rule_table
 *
 * Создание таблицы для хранения правил
 * для доступа к бизнес логике приложения.
 * Групируется по таблице access благодаря
 * связям на нее по полю access_id
 */
class m150101_333333_create_rule_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%rule}}",[
            /*
             * Название правила
             */
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Принадлежность к определенной роли доступа
             * из таблицы access
             */
            'access_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            /*
             * Название модуля для получения правила доступа
             */
            'module' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            /*
             * Название контроллера для получения правила доступа
             */
            'controller' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Название экшена для получения плавила доступа
             */
            'action' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Определяет разрешение доступа для бизнес логики
             * указанной в module, controller, action полях
             */
            'is_accept' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT TRUE',
            /*
             * Поле предоставляющее исключение по полю is_accept
             * и инвертирует значение is_accept если except_condition
             * удовлетворяет требованиям выражения находящимся в нем
             */
            'except_condition' => Schema::TYPE_TEXT . ' NOT NULL DEFAULT ""',
            /*
             * Статус данного правила
             * ссылается на таблицу status
             * где определяется флаг активности записи
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ],$tableOptions);

        $this->addPrimaryKey("pk","{{%rule}}",[
            'access_id',
            'module',
            'controller',
            'action'
        ]);

        $this->addForeignKey("rule_access","{{%rule}}",[
            'access_id'
        ],"{{%access}}",[
            'id'
        ],"RESTRICT","CASCADE");


    }

    public function down()
    {
        $this->dropTable("{{%rule}}");
    }

}
