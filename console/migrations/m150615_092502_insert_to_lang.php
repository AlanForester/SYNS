<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\db\Migration;

class m150615_092502_insert_to_lang extends Migration
{
    public function up()
    {
        $this->insert("{{%lang}}", [
            'code' => 'RU',
            'title' => 'Русский язык',
            'status' => true
        ]);
    }

    public function down()
    {
        $this->delete("{{%lang}}");
    }

}
