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
 * Class m150228_003841_create_user_table
 *
 * Таблица с записями пользователей
 */
class m150228_003841_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            /*
             * Идентификатор пользователя или логин
             *
             */
            'login' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Почта пользователя
             * Уникальный индекс
             */
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Телефон пользователя
             * Уникальный индекс
             */
            'phone' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            /*
             * Имя пользователя
             */
            'name' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            /*
             * Фамилия пользователя
             */
            'surname' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            /*
             * Отчество пользователя
             */
            'last_name' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            /*
             * Дата рождения пользователя
             * в TimeStamp представлении
             */
            'birthday' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            /*
             * Страна пользователя
             */
            'country' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Область пользователя
             */
            'zone' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Город пользователя
             */
            'city' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Район города пользователя
             */
            'area' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Улица города пользователя
             */
            'street' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Строение(дом) улицы пользователя
             */
            'build' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Квартира дома пользователя
             */
            'flat' => Schema::TYPE_STRING . ' DEFAULT NULL',
            /*
             * Ключ авторизации пользователя
             * Используется во фронтенде,
             * а так же в РЕСТ сервисе
             */
            'auth_key' => Schema::TYPE_STRING . '(128) NOT NULL',
            /*
             * Хеш пароля пользователя
             * Генерируется средствами
             * фреймворка
             */
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            /*
             * Токен восстановления пароля
             * Генерируется при восстановлении
             * пароля пользователем, который отправляется
             * на его почту для дальнейшей валидации
             */
            'password_reset_token' => Schema::TYPE_STRING . ' NULL',
            /*
             * Рейтинг пользователя
             */
            'rating' => Schema::TYPE_BIGINT . ' NULL DEFAULT 0',
            /*
             * Глобальный статус активности строки
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            /*
             * Время создания записи
             * в TimeStamp
             */
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            /*
             * Время обновления записи
             * в TimeStamp
             */
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ], $tableOptions);

        $this->addPrimaryKey("pk","{{%user}}",[
            'login'
        ]);

        $this->createIndex('email','{{%user}}','email',true);
        $this->createIndex('phone','{{%user}}','phone',true);

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
