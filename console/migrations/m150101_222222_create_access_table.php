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
 * Class m150101_222222_create_access_table
 *
 * Создания таблицы ролей доступа для пользователей
 * Роли определяют доступ к бизнес логике
 * приложения из связанной таблицы rule
 * так же использует флаг global_access
 * который устанавливает глобальные разрешения
 * после прохождения всех правил из таблицы
 * rule для пользователей
 */
class m150101_222222_create_access_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%access}}",[
            /*
             * Идентификатор
             */
            'id' => Schema::TYPE_PK . ' NOT NULL AUTO_INCREMENT',
            /*
             * Имя роли
             */
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Описание для роли
             */
            'description' => Schema::TYPE_TEXT . ' NOT NULL DEFAULT ""',
            /*
             * Статус данной роли
             * ссылается на таблицу status
             * где определяется флаг активности записи
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            /*
             * Глобальные разрешения после
             * применения всех правил доступа
             * из таблицы rule
             */
            'global_accept' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT FALSE'
        ],$tableOptions);

    }

    public function down()
    {
        $this->dropTable("{{%access}}");
    }

}
