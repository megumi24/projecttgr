<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTp */

$this->title = $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-tp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nomor_surat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nomor_surat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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
            'no',
            'nomor_surat',
            // 'nama',
            'NIP',
            'satuan_kerja',
            'total',
        ],
    ]) ?>

</div>
