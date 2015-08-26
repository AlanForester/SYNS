<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_075840_create_user_table extends Migration
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
            'login' => $this->string(128)->notNull(),
            /*
             * Почта пользователя
             * Уникальный индекс
             */
            'email' => $this->string(128)->notNull(),
            /*
             * Телефон пользователя
             * Уникальный индекс
             */
            'phone' => $this->string(64),
            /*
             * Имя пользователя
             */
            'name' => $this->string(255),
            /*
             * Фамилия пользователя
             */
            'surname' => $this->string(255),
            /*
             * Отчество пользователя
             */
            'last_name' => $this->string(255),
            /*
             * Дата рождения пользователя
             * в TimeStamp представлении
             */
            'birthday' => $this->dateTime()->defaultValue(0),
            /*
             * Страна пользователя
             */
            'country' => $this->string(255),
            /*
             * Область пользователя
             */
            'zone' => $this->string(255),
            /*
             * Город пользователя
             */
            'city' => $this->string(255),
            /*
             * Район города пользователя
             */
            'area' => $this->string(255),
            /*
             * Улица города пользователя
             */
            'street' => $this->string(255),
            /*
             * Строение(дом) улицы пользователя
             */
            'build' => $this->string(255),
            /*
             * Квартира дома пользователя
             */
            'flat' => $this->string(255),
            /*
             * Ключ авторизации пользователя
             * Используется во фронтенде,
             * а так же в РЕСТ сервисе
             */
            'auth_key' => $this->string(128),
            /*
             * Хеш пароля пользователя
             * Генерируется средствами
             * фреймворка
             */
            'password_hash' => $this->string(255)->notNull(),
            /*
             * Токен восстановления пароля
             * Генерируется при восстановлении
             * пароля пользователем, который отправляется
             * на его почту для дальнейшей валидации
             */
            'password_reset_token' => $this->string(128),
            /*
             * Рейтинг пользователя
             */
            'rating' => $this->bigInteger()->defaultValue(0),
            /*
             * Глобальный статус активности строки
             */
            'status' => $this->boolean()->defaultValue(1),
            /*
             * Время создания записи
             * в TimeStamp
             */
            'created_at' => $this->timestamp()->defaultValue("NOW()"),
            /*
             * Время обновления записи
             * в TimeStamp
             */
            'updated_at' => $this->timestamp()->defaultValue("NOW()"),
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
