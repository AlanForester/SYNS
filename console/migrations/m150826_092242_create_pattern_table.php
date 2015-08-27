<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_092242_create_pattern_table extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%pattern}}",[
            'id' => $this->bigInteger()->notNull(),
            'measure' => $this->integer(11)->notNull(),
            'degree' => $this->integer(11)->notNull(),
            /*
             * Абцисса
             * Ордината
             * Аппликата - Объем
             */
            'x' => $this->bigInteger()->notNull(),
            'y' => $this->bigInteger()->notNull(),
            'z' => $this->bigInteger()->notNull(),
            /*
             * Углы
             * относительно x
             * относительно y
             * относительно z
             */
            'angle_x' => $this->float()->notNull(),
            'angle_y' => $this->float()->notNull(),
            'angle_z' => $this->float()->notNull(),
            /*
             * Сила энергии - выброс
             * Сила притяжения, концентрации, поглощения, *замедления*
             * TODO: Сила притяжения равна инверсному значению release
             * Частота
             */
            'release' => $this->float()->notNull(),
            'gravity' => $this->float()->notNull(),
            'freq' => $this->float()->notNull(),
            /*
             * изгиб, прогиб, сгибание, флексура, кривизна, искривление
             * твист, поворот, кручение, крутка, скручивание, искривление
             * деформация, уродование, обезображивание, искривление, искажение
             * Длина
             * Размер
             * Вес
             */
            'flex' => $this->float()->notNull(),
            'twist' => $this->float()->notNull(),
            'length' => $this->float()->notNull(),
            'size' => $this->float()->notNull(),
            'weight' => $this->float()->notNull(),
        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%pattern}}',[
            'id',
        ]);

        $this->createIndex('pattern_point','{{%pattern}}',[
            'measure',
            'degree',
        ]);

        $this->createIndex('position',"{{%pattern}}",[
            'x',
            'y',
            'z'
        ], true);

        $this->createIndex('sin_wave',"{{%pattern}}",[
            'release',
            'gravity',
            'freq'
        ], true);

        $this->createIndex('angle',"{{%pattern}}",[
            'angle_x',
            'angle_y',
            'angle_z'
        ], true);

        $this->createIndex('physics',"{{%pattern}}",[
            'flex',
            'twist',
            'length',
            'size',
            'weight'
        ], true);

    }

    public function down()
    {
        $this->dropTable("{{%pattern}}");
    }
}
