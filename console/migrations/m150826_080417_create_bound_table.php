<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_080417_create_bound_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%bound}}",[
            'id' => $this->double()->notNull(),
            /*
             * Степень объекта в графе и ее схема
             */
            'scheme_by' => $this->double()->notNull(),
            /*
             * Глобальный статус звена
             */
            'status' => $this->boolean()->notNull(),
            /*
             * Сама сущность
             * Поколение наследующее свойства родителей
             * совместно с действием как результат генерации
             */
            'mark_by' => $this->string()->notNull(),

        ],$tableOptions);

        $this->addPrimaryKey('pk','{{%bound}}',[
            'id',
        ]);

        $this->createIndex('scheme','{{%bound}}',[
            'scheme_by',
        ],true);

    }

    public function down()
    {
        $this->dropTable("{{%bound}}");
    }
}
