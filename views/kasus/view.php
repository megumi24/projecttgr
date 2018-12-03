<!DOCTYPE html>
<html>
<head>
<style>
.pilih{
    background-color: #4CAF50;
    color: white;
    padding: 10px 8px;
    text-decoration: none;
    display: block;
}
    
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    if (!document.getElementsByTagName)
        return false;
    var links = document.getElementsByTagName("a");
    for (var eleLink=0; eleLink < links.length; eleLink ++)
    {
        if (links[eleLink].href.indexOf('.pdf') !== -1)
        {
            links[eleLink].onclick = function() { window.open(this.href, 'resizable,scrollbars'); return false; }
        }
    }
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("select").on('change', function(){
        alert("Status Kasus => "+this.value+"!");
    });
});
</script>

</head>
<body>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\DokumenKerugian;

/* @var $this yii\web\View */
/* @var $model app\models\Kasus */

$this->title = $model->id_kasus;
$this->params['breadcrumbs'][] = ['label' => 'Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kasus-tgr-view">

    
    <p>
        <?php 
			if ( Yii::$app->user->getIdentity()->level==2 && ( $model->status_kasus == '0' || $model->status_kasus == '1') ){
				echo Html::a('Update Kasus', ['update', 'id' => $model->id_kasus], ['class' => 'btn btn-primary']);
			}
		?>
		<?php
			if ( Yii::$app->user->getIdentity()->level==1 ){
				//echo Html::button('Ubah Status Kasus', ['value'=> Url::to('index.php?=kasus-tgr/status'), 'class' => 'btn btn-success', 'id'=>'statusButton']);
				echo Html::a('Ubah Status Kasus', ['status', 'id' => $model->id_kasus], ['class' => 'btn btn-primary']);
			}
		?> 
        <?php if ( Yii::$app->user->getIdentity()->level==2 ){
        	echo Html::a('Hapus Kasus', ['delete', 'id' => $model->id_kasus], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); } ?>

    </p>


	<h2>Rincian Laporan Kasus</h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_kasus',
            [
			'attribute' => 'status_kasus',
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
			'attribute'=>'jenis_kerugian',
			'value' => $model->jenisKerugian->jenis_kerugian,
			'label' => 'Jenis Kerugian'
			],
			'id_debitur',
			[
            'attribute'=>'kdsatker',
			'value' => $model->kdsatker0->nama_satker,
            'label' => 'Satuan Kerja',
            ],
			'nama_peristiwa',
            'tgl_dibuat',
            'tgl_peristiwa',
			[
			'attribute' => 'tata_cara',
			'value' => function($model){
				if($model->tata_cara == '0'){
					return 'Cicilan';
				}elseif($model->tata_cara == '1'){
					return 'Tunai';
				}elseif($model->tata_cara == '2'){
					return 'Potong Gaji';
				}
			}
			],
            'nilai',
			
			'ket_lain'
        ],
    ]) ?>
	<br/>
	<br/>
	<h2>Dokumen Kasus</h2>
    <br/>
	<p>
        <?php 
			if ( Yii::$app->user->getIdentity()->level==2 && $model->status_kasus == '0'){
				echo Html::a('Update Dokumen', ['update', 'id' => $model->id_kasus], ['class' => 'btn btn-primary']);
			}
		?>
	</p>
	<br/>
    <div class="row">
	<?php $dok = DokumenKerugian::find()
							->where(['id_kerugian'=>$model->jenis_kerugian])
							->all();
				
			foreach($dok as $dok){
	?>
	
	<div class="col-md-3" style="height:215px">
		<div style="height:150px;display:flex;align-items:center;justify-content:center;">
		<?php 
		
		?>
		<img src="<?php echo Yii::$app->request->baseUrl; ?>/webpict/pdflogo.png" height="70" ></img>
		</div>
		<div style="height:50px; background-color:white;text-align:center;display:flex;align-items:center;justify-content:center;">
			<?= Html::a($dok->dokumen->jenis_dokumen, ['openpdf','id'=>$model->id_kasus]) ?>
		</div>
		<div style="height:15px; background-color:grey;text-align:center; color:white; display:flex;align-items:center;justify-content:center;">
		Status
		</div>
	</div>
	
	<?php
			}
	?>
	
	<br/>
	<br/>
	<br/>
	
    </div>
	</div>
</div>
</body>
</html>
