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
 * Class m150231_003931_create_chain_table
 *
 * Таблица хранит звязи эволюции науки
 */
class m150231_003931_create_chain_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%chain}}",[
            'id' => $this->double()->notNull(),
            /*
             * Степень объекта в графе и ее схема
             */
            'scheme_by' => Schema::TYPE_DOUBLE . ' NOT NULL',
            /*
             * Глобальный статус цепи
             */
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            /*
             * Сама сущность
             * Поколение наследующее свойства родителей
             * совместно с действием как результат генерации
             */
            'mark_by' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            /*
             * орудие, инструмент, принадлежность, принадлежности, прибор
             *
             * -> \./
             *     |
             *
             * в 2х мерном пространстве
             *
             * 0 - наследие от нуля
             */
            'implement_of' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'implement_rank' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'implement_process' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            /*
             * двигатель
             *
             * \./ <-
             *  |
             *
             * в 2х мерном пространстве
             * Действуя и анализируя свой опыт
             * сущность создает новое качество
             * в самой себе
             */
            'engine_of' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'engine_rank' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'engine_process' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            /*
             * поколение, генерация, образование, генерирование, новая ступень развития
             *
             * \./
             *  |<-
             *
             * в 2х мерном пространстве
             * Результат воздействия engine на implement
             * Полученный опыт
             */
            'generation_to' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'generation_rank' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'generation_process' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            /*
             * распад, измельчение, дезинтеграция, разрушение, раздробление
             *
             * \./_
             *  |  ^-
             *
             * в 3х мерном пространстве
             * Результат воздействия engine на себя
             */
            'disintegration_to' => Schema::TYPE_STRING . ' NULL DEFAULT NULL',
            'disintegration_rank' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'disintegration_process' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',

            'extra' => $this->text()->defaultValue(""),

        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%chain}}',[
            'id',
        ],true);

        $this->createIndex('link','{{%chain}}',[
            'scheme_by',
        ],true);

        $this->addForeignKey('chain_scheme','{{%chain}}',[
            'scheme_by',
        ],'{{%scheme}}', [
            'id'
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('link_mark','{{%chain}}',[
            'mark_by',
        ],'{{%mark}}', [
            'id',
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('link_implement','{{%chain}}',[
            'implement_of',
        ],'{{%mark}}', [
            'id',
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('link_engine','{{%chain}}',[
            'engine_of',
        ],'{{%mark}}', [
            'id',
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('link_generation','{{%chain}}',[
            'generation_to',
        ],'{{%mark}}', [
            'id',
        ],'RESTRICT','CASCADE');

        $this->addForeignKey('link_disintegration','{{%chain}}',[
            'disintegration_to',
        ],'{{%mark}}', [
            'id',
        ],'RESTRICT','CASCADE');

    }

    public function down()
    {
        $this->dropTable("{{%chain}}");
    }

}
