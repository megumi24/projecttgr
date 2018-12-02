<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaran */

$this->title = $model->ntpn;
$this->params['breadcrumbs'][] = ['label' => 'Rincian Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rincian-pembayaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ntpn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ntpn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomor_sktjm',
            'ntpn',
            'pembayaran',
            'kode_satker',
            'status',
        ],
    ]) ?>

</div>
