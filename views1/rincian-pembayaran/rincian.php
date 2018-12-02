<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\RincianPembayaran;

/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaran */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Rincian Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rincian-pembayaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
   <table style=" width: 20%;">
    <tr>
        <td>Nomor SKTJM</td>
        <td><?php
           echo $kasus->nomor_sktjm;
        ?></td> 
    </tr>
    <tr>
        <td>Total dibayar</td>
        <td><?php
            $total = $kasus->nilai;

            $bayar = RincianPembayaran::find()->select(['pembayaran'])->where(['id_kasus' => $kasus->id_kasus])->asArray()->all();
            $array = array_column($bayar, 'pembayaran');
            $dibayar = array_sum($array);


            print_r($dibayar);
        ?></td>
    </tr>
    <tr>
        <td>Sisa Pembayaran</td>
        <td><?php
            $total = $kasus->nilai;

            $bayar = RincianPembayaran::find()->select(['pembayaran'])->where(['id_kasus' => $kasus->id_kasus])->asArray()->all();
            $array = array_column($bayar, 'pembayaran');
            $dibayar = array_sum($array);


            print_r($total-$dibayar);
        ?></td>
    </tr>
   </table>
   <br/>

    <p>
        <?= Html::a('Tambah Pembayaran', ['create', 'id' => $kasus->id_kasus], ['class' => 'btn btn-primary']) ?>
    </p>

   <?php
  
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
             //'id_kasus',
            'ntpn',
            'tgl_bayar',
            'pembayaran',
                
        ],
    ]); 
   
    ?>

</div>
