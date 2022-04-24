<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\helpers\CurrencyHelper;
use app\models\Currency;
use yii\console\Controller;
use yii\console\ExitCode;

class InitController extends Controller
{

    public function actionIndex()
    {
        Currency::deleteAll();
        $day = date_create()->modify('-31 days');
        for ($i = 0; $i <= 30; $i++){
            $day = $day->modify('+1 day');
            $day_str = $day->format('d/m/Y');
            $currencies = CurrencyHelper::getByDate($day_str);
            $res_count = count($currencies);
            $saved_count = CurrencyHelper::saveToDB($currencies);
            echo sprintf('Day %s: Saved %s currencies from %s', $day_str, $saved_count, $res_count) . PHP_EOL;
        }

        return ExitCode::OK;
    }
}
