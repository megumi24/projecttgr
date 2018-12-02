<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaran */

$this->title = 'Create Rincian Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Rincian Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rincian-pembayaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
