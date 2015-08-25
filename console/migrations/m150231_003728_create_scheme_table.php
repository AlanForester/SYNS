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
 * Class m150231_003728_create_scheme_table
 */
class m150231_003728_create_scheme_table extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%scheme}}",[
            'id' => $this->double()->notNull(),
            'measure' => $this->integer(11)->notNull(),
            'degree' => $this->integer(11)->notNull(),
            /*
             * Абцисса
             * Ордината
             * Аппликата - Объем
             */
            'x' => Schema::TYPE_BIGINT . ' NOT NULL DEFAULT 0',
            'y' => Schema::TYPE_BIGINT . ' NOT NULL DEFAULT 0',
            'z' => Schema::TYPE_BIGINT . ' NOT NULL DEFAULT 0',
            /*
             * Углы
             * относительно x
             * относительно y
             * относительно z
             */
            'angle_x' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'angle_y' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'angle_z' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            /*
             * Сила энергии - выброс
             * Сила притяжения, концентрации, поглощения, *замедления*
             * TODO: Сила притяжения равна инверсному значению release
             * Частота
             */
            'release' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'gravity' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'freq' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            /*
             * изгиб, прогиб, сгибание, флексура, кривизна, искривление
             * твист, поворот, кручение, крутка, скручивание, искривление
             * деформация, уродование, обезображивание, искривление, искажение
             * Длина
             * Размер
             * Вес
             */
            'flex' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'twist' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'length' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'size' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
            'weight' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 0',
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%scheme}}',[
            'id',
        ]);

        $this->createIndex('scheme_point','{{%scheme}}',[
            'measure',
            'degree',
        ]);

        $this->createIndex('position',"{{%scheme}}",[
            'x',
            'y',
            'z'
        ], true);

        $this->createIndex('sin_wave',"{{%scheme}}",[
            'release',
            'gravity',
            'freq'
        ], true);

        $this->createIndex('angle',"{{%scheme}}",[
            'angle_x',
            'angle_y',
            'angle_z'
        ], true);

        $this->createIndex('physics',"{{%scheme}}",[
            'flex',
            'twist',
            'length',
            'size',
            'weight'
        ], true);

    }

    public function down()
    {
        $this->dropTable("{{%scheme}}");
    }

}
