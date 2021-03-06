<?php

use yii\grid\GridView;
use frontend\models\States;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .table>thead>tr:first-child>th:first-child, .table>tbody>tr:first-child>td:first-child {
        width: 5% !important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <div class="card">
                    <div class="card-header1 card-header-text" data-background-color="blue">
                        <h4 class="card-title">CITIES MANAGER </h4>
                        <a href="<?= Yii::$app->request->baseUrl ?>/cities/create">
                            <button type="button" class="btn btn-primary btn-round btn-fab btn-fab-mini pull-right ">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>

                    </div>
                    <div class="card-content ">

                        <div class="material-datatables">

                            <div class="row">
                                <div class="col-md-12" style="overflow-x: auto;">
                                     <?php $dataProvider->pagination->pageSize = 10; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'city_name',
          //  'state_id',
                                                        [
                                                'label' => 'State Name',
                                                'value' => function ($model, $index) {
                                                    return States::findOne(['id' => $model->state_id])->state_name;
                                                }
                                            ],
                                            ['class' => 'yii\grid\ActionColumn',
                                                'header' => 'Actions',
                                            ],
        ]
    ]); ?>
 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
