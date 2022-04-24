<?php

use app\models\Currency;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Currencies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <form id="form">
        <p>
            <?= Html::a(Yii::t('app', 'Create Currency'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'date',
                'dateFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                    'altFormat' => "yyyy-MM-dd",
                    'minDate' => -30,
                    'maxDate' => 0,
                    'onSelect' => new JsExpression('function (dateText, inst){$("#form").submit()}')
                ],
                'options' => ['class' => 'float-right']
            ]) ?>
        </p>
    </form>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'valuteID',
            'numCode',
            'charCode',
            'name',
            'value',
            'date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Currency $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>