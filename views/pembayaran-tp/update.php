<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTp */

$this->title = 'Update Pembayaran Tp: ' . $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomor_surat, 'url' => ['view', 'id' => $model->nomor_surat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-tp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
