<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTgr */

$this->title = 'Update Pembayaran Tgr: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Tgrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-tgr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
