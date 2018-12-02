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

    <div>
        Keterangan Debitur

        <?= $form->field($model, 'jenis_debitur')->dropDownList(
        ['0' => 'Pegawai', '1' =>  'Non Pegawai' ]);
        ?>

        <div id="pegawai">
            <?= $form->field($model, 'id_debitur')->dropDownList(
            ArrayHelper::map(Pegawai::find()->all(),'nip','nip'),
            ['prompt'=>'Pilih NIP',
            ]); ?>
        </div>

        <div id="non-pegawai">
            <p><?= Html::a('Tambah Data Debitur', ['update', 'id' => $model->id_kasus], ['class' => 'btn btn-primary']); ?></p>
            <?= $form->field($model, 'id_debitur')->dropDownList(
            ArrayHelper::map(Pegawai::find()->all(),'nip','nip'),
            ['prompt'=>'Pilih NIP',
            ]); ?>
        </div>

    </div>

    <?= $form->field($model, 'tipe_kasus')->dropDownList(
    ['TGR' => 'TGR', 
    'TP' =>  'TP', 
	]);
	?>
	
	<?= $form->field($model, 'jenis_kerugian')->dropDownList(
			ArrayHelper::map(JenisKerugian::find()->all(),'id','jenis_kerugian'),
			['prompt'=>'Pilih Jenis Kerugian',
			'onchange'=>'$.get( "'.Yii::$app->urlManager->createUrl(['kasus/getdokumen']).'&id="+$(this).val(),function(data){
                 $("#test").html( data );console.log(data);
                 })'
			]);
    ?>
	
	
    <?= $form->field($model, 'nama_peristiwa')->hint('Contoh: Kehilangan Sepeda Motor')->textInput(['maxlength' => true])
    
    ?>


    <?= $form->field($model, 'tgl_peristiwa')->widget(DatePicker::classname(), [
        'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ]
    ]); ?>
    
    <?php


    echo $form->field($model, 'id_debitur')->dropDownList(
			ArrayHelper::map(Pegawai::find()->all(),'nip','nip'),
			['prompt'=>'Pilih NIP',
			]);
    ?>
    <div id ="nip">
        
    </div>
<!--     <button id="tambah">Tambah</button> <button id="kurang">Kurang</button>
    <br>
    <br>
 -->
	

    <?= $form->field($model, 'nilai')->textInput() ?>
	
	<?= $form->field($model, 'tata_cara')->dropDownList(
    ['0' => 'Cicilan', '1' =>  'Tunai', '2' => 'Potong Gaji' 
	]);
	?>
	
    <?= $form->field($model, 'tahun')->dropDownList(['2018','2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000']) ?>

    <?= $form->field($model, 'ket_lain')->textarea(['rows' => 6]) ?>

    <div id="test">
	
	
    </div>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit Info' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php 
	ActiveForm::end(); 
	
	?>
</div>
</div>