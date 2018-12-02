<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KasusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kasus';
$this->params['breadcrumbs'][] = $this->title;
$modelsatker = new app\models\Satker;
$namasatker = $modelsatker->getNamaSatkerById(Yii::$app->user->identity->username);
?>
<div class="kasus-tgr-index">

    <h1>Daftar Kasus</h1>
    
	<p>
	<?php 
		if ( Yii::$app->user->getIdentity()->level==2 ){
			echo Html::a('Lapor Kasus', ['create'], ['class' => 'btn btn-success']);
		}
	?>
	</p>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_kasus',
			'tipe_kasus',
            'nama_peristiwa',
			'id_debitur',
            'tgl_dibuat',
            [
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
            'visible' => Yii::$app->user->getIdentity()->level==1,
			'label' => 'Satuan Kerja',
            'value' => 'kdsatker0.nama_satker',
            ],
			//'tgl_peristiwa',
            //'satker',
            // 'jenis_kerugian',
            // 'nilai',
            // 'tahun',
            // 'ket_lain:ntext',
            
			[
			'label'=>'Status Kasus',
			'value' => function($model){
				if($model->status_kasus == '0'){
					return 'Belum Diproses';
				}elseif($model->status_kasus == '1'){
					return 'Dalam Proses';
				}elseif($model->status_kasus == '2'){
					return 'Diproses';
				}
			}

			],
            [
            'class' => 'yii\grid\ActionColumn',
			'header' => 'Action',
			'options'=>['class'=>'action-column'],
            'template' => '{lihat} {surat} {nota} {bayar} ',
            'buttons' => [
				'lihat' => function($url,$model,$key){
							$btn = Html::a("<span class='glyphicon glyphicon-eye-open'></span>",
							['view', 'id'=>$model->id_kasus],
							['title' => Yii::t('app', 'Lihat Detail Kasus')]
						);
					return $btn;
				},
				'surat' => function($url,$model,$key){
							$btn = Html::a("<span class='glyphicon glyphicon-envelope'></span>",
							['surat/viewsurat', 'id'=>$model->id_kasus],
							['title' => Yii::t('app', 'Surat')]
						);
					return $btn;
				},
				'bayar' => function($url,$model,$key){
							$btn = Html::a("<span class='glyphicon glyphicon-credit-card'></span>",
							['rincian-pembayaran/rincian', 'id'=>$model->id_kasus ],
							['title' => Yii::t('app', 'Pembayaran')]
						);
					return $btn;
				},
				/*'nota' => function($url,$model,$key){
							$btn = Html::a("<span class='glyphicon glyphicon-file'></span>",
							['rincian-pembayaran/nota', 'id'=>$model->id_kasus ],
							['title' => Yii::t('app', 'Nota Pembayaran')]
						);
					return $btn;
				},*/
			],
            ],
		],
    ]); 
	
	?>
</div>
