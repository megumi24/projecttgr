<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    
$(document).ready(function(){
    $("#tambah").click(function(){
        $.post(Yii::$app->urlManager->createUrl(['kasus-tgr/getnip']), function(data){$("#nip").html(data)}); return false;
    });

    $("#kurang").click(function(){
        $("#kurang").click(function(){
            $("#nip").hide(); return false;
        });
    });
});

</script>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\JenisKerugian;
use app\models\DokumenKerugian;
use yii\base\Model;
use yii\web\Controller;


// use yii\helpers\ArrayHelper;
// use app\models\KasusTgr;
// use app\models\MasterSurat;
/* @var $this yii\web\View */
/* @var $model app\models\KasusTgr */
/* @var $form yii\wid gets\ActiveForm */
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="kasus-tgr-create">

    <h1><?= $model->jenisKerugian->jenis_kerugian ?></h1>

    <div class="kasus-tgr-form">
	
	<hr/>
	<h6>Keterangan Umum</h6>
	<hr/>
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
		<br>
        
			<?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'nama_peristiwa')
				->hint('Contoh: Kehilangan Sepeda Motor')
				->textInput(['maxlength' => true])
			?>


			<?= $form->field($model, 'tgl_peristiwa')->widget(DatePicker::classname(), [
				'pluginOptions' => [
				'format' => 'yyyy-mm-dd',
				'todayHighlight' => true]
				]); 
			?>
		
			<?= $form->field($model, 'nilai')->textInput() ?>

			<?= $form->field($model, 'tahun')->dropDownList(['2018','2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000']) ?>

			<?= $form->field($model, 'ket_lain')->textarea(['rows' => 6]) ?>

	<hr/>
	<h6>Upload Dokumen</h6>
	<hr/>
	
			<?php 
				
				$dok = DokumenKerugian::find()
							->innerjoin('jenis_dokumen','jenis_dokumen.id = dokumen_kerugian.id_dokumen')
							->select('jenis_dokumen')
							->where(['id_kerugian'=>$model->jenis_kerugian])
							->all();
				
				foreach($dok as $dok){
					//echo $form->field($modelDokumen, 'upload')->fileInput()->label($dok->jenis_dokumen);
				}
			?>
		
		
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
	</div>