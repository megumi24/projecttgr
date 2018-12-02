<?php

use yii\helpers\Html;
use 	yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $model app\models\KasusTgr */

$this->title = 'Lapor Kasus TGR';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kasus', 'url' => ['index']];
?>
<div class="kasus-tgr-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<br/>
	<?php
	echo Alert::widget([
    'options' => [
        'class' => 'alert-info',
    ],
    'body' => 'Kasus telah berhasil direkam. Silakan lengkapi dokumen di bawah ini.',
	]);
	?>
	<h4>2 - Dokumen Pendukung</h4>

    <?= $this->render('_formdok', [
        'model' => $dok, 'jenis' => $jenisDokumen
    ]) ?>

</div>
