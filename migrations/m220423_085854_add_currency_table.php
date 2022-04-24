<?php

use yii\db\Migration;

/**
 * Class m220423_085854_add_currency_table
 */
class m220423_085854_add_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'valuteID' => $this->string()->notNull(),
            'numCode' => $this->string()->notNull(),
            'charCode' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
            'date' => $this->date()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }

}
