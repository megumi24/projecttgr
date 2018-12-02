<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
			'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
			'label' => 'Nomor SKTJM',
            'value' => 'kasus.nomor_sktjm',
            ],
			'nomor_surat',
            [
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
			'label' => 'Jenis Surat',
            'value' => 'jenissurat.jenis_surat',
            ],
			
           
            'tgl_upload',
            //'path_surat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
