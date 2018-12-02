<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekonsiliasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekonsiliasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rekonsiliasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tanggal',
            'pembayaran',
            'NTPN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
