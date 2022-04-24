<?php

namespace app\modules\api\v1\controllers;

use app\helpers\Utilities;
use app\models\Currency;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;

class CurrencyController extends ActiveController
{
    public $modelClass = 'app\models\Currency';

    /**
     * @throws BadRequestHttpException
     */
    public function actionValute($valuteID, $from=null, $to=null){
        if ($from && !Utilities::checkDate($from)){
            throw new BadRequestHttpException('Date format is incorrect. Correct format is YYYY-MM-DD');
        }

        if ($to && !Utilities::checkDate($to)){
            throw new BadRequestHttpException('Date format is incorrect. Correct format is YYYY-MM-DD');
        }
        return Currency::find()
            ->where([
                'valuteID' => $valuteID
            ])
            ->andFilterWhere(['>', 'date', $from])
            ->andFilterWhere(['<', 'date', $to])
            ->all();
    }
}