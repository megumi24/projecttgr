<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Kasus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RincianPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rincian-pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); 
	?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_kasus',
			[
			'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
            'label' => 'Tipe Kasus',
            'value' => function($model){
               $status = Kasus::find()->select(['status_kasus'])->where(['id_kasus' => $model->id_kasus])->one();
               return $status=='1'? 'TP':'TGR';
            },
			],
			[
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
            'label' => 'Nomor SKTJM',
            'value' => 'kasus.nomor_sktjm',
            ],
            'ntpn',
			'tgl_bayar',
            'pembayaran',
            'sisa_pembayaran',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
