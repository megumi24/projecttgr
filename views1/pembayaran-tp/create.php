<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTp */

$this->title = 'Create Pembayaran Tp';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-tp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
