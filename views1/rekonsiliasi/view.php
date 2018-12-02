<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rekonsiliasi */

$this->title = $model->NTPN;
$this->params['breadcrumbs'][] = ['label' => 'Rekonsiliasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekonsiliasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->NTPN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->NTPN], [
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
            'tanggal',
            'pembayaran',
            'NTPN',
        ],
    ]) ?>

</div>
