<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTgr */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Tgrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-tgr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'visible' => Yii::$app->user->getIdentity()->level==1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
	<?= 
	
	DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nomor_sktjm',
            'jenis_peristiwa',
            // [
            //     // 'label' => '',
            //     'attribute' => 'nama',
            //     'value' => function ($nama),
            // ],
            'nip',
            //'nama',
            'satuan_kerja',
            'tata_cara:ntext',
            'target_memenuhi',
            //'periode',
            //'total',
            //'sisa_pembayaran',
            //'status_cicilan:ntext',
            // 'ntpn',
            // 'pembayaran',
            // 'kode_satker',
            // 'status',
        ],
    ]); 
	
	?>
	
	<p>
        <?= Html::a('Tambah Pembayaran', ['create', 'id' => $model->id, 'visible' => Yii::$app->user->getIdentity()->level==1], ['class' => 'btn btn-primary']) ?>
	</p>
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            // 'nomor_sktjm',
            // 'jenis_peristiwa',
            // 'nama_pegawai:ntext',
            // 'NIP',
            // 'satuan_kerja',
            // 'tata_cara:ntext',
            // 'target_memenuhi',
            // 'periode',
            // 'total',
            // 'status_cicilan:ntext',
            'ntpn',
            'pembayaran',
            'kode_satker',
            'status',
			['class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'template' => '{update}{delete}',
            ],
        ],
    ]) ?>

</div>
