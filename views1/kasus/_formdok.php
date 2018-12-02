<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

use yii\helpers\ArrayHelper;
use app\models\JenisKerugian;
use app\models\Wilayah;
use app\models\Pegawai;



// use yii\helpers\ArrayHelper;
// use app\models\Kasus;
// use app\models\MasterSurat;
/* @var $this yii\web\View */
/* @var $model app\models\Kasus */
/* @var $form yii\wid gets\ActiveForm */
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="kasus-tgr-form">
    
    <div class="col-sm-6" >
	
	<?php

	$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','data'=>true]]); 
	
	?>
    
	<br>
	<?php
	//echo $jenis->dokumen->jenis_dokumen;
	
	foreach($model as $index){
		//echo $form->field($model, "[$index]id_jenis")->hiddenInput(['value'=>$jenis->id_dokumen])->label(false);
		echo $form->field($model, "[$index]upload")->fileInput();}
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit Dokumen' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php 
	ActiveForm::end(); 
	?>
</div>
</div>