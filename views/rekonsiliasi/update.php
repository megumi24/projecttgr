<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rekonsiliasi */

$this->title = 'Update Rekonsiliasi: ' . $model->NTPN;
$this->params['breadcrumbs'][] = ['label' => 'Rekonsiliasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NTPN, 'url' => ['view', 'id' => $model->NTPN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rekonsiliasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
