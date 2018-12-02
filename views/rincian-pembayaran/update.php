<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaran */

$this->title = 'Update Rincian Pembayaran: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rincian Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rincian-pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
