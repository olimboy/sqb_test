<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $valuteID
 * @property string $numCode
 * @property string $charCode
 * @property string $name
 * @property string $value
 * @property string $date
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valuteID', 'numCode', 'charCode', 'name', 'value', 'date'], 'required'],
            [['date'], 'safe'],
            [['valuteID', 'numCode', 'charCode', 'name', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'valuteID' => Yii::t('app', 'Valute ID'),
            'numCode' => Yii::t('app', 'Num Code'),
            'charCode' => Yii::t('app', 'Char Code'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
