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
    
    <div>

    </div>
    <div>
        <?= Html::a('Cari Debitur', ['create'], ['class' => 'btn btn-link']) ?>

        <?= $form->field($model, 'id_debitur')->textInput()->hint('Masukkan NIP untuk pegawai') ?>

        <?= $form->field($model, 'tipe_kasus')->dropDownList(
        ['TGR' => 'TGR', 
        'TP' =>  'TP', 
    	]);
    	?>
    	
    	<?= $form->field($model, 'jenis_kerugian')->dropDownList(
    			ArrayHelper::map(JenisKerugian::find()->all(),'id','jenis_kerugian'),
    			['prompt'=>'Pilih Jenis Kerugian',
    			/*'onchange'=>'$.get( "'.Yii::$app->urlManager->createUrl(['kasus/getdokumen']).'&id="+$(this).val(),function(data){
                     $("#test").html( data );console.log(data);
                     })'*/
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
        
        
        <div id ="nip">
            
        </div>
    <!--     <button id="tambah">Tambah</button> <button id="kurang">Kurang</button>
        <br>
        <br>
     -->
    	

        <?= $form->field($model, 'nilai')->textInput() ?>
    
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

<script type="text/javascript">
    $( document ).ready(function() { //wait until body loads
        var testimonial_ok=false; //keeps track of whether the testimonial box is filled out

        //Inputs that determine what fields to show
        var jenis = $('#live_form input:radio[name=jenis]');
        
        //Wrappers for all fields
        var bad = $('#live_form textarea[name="feedback_bad"]').parent();
        var ok = $('#live_form textarea[name="feedback_ok"]').parent();
        var great = $('#live_form textarea[name="feedback_great"]').parent();
        var testimonial_parent = $('#live_form #div_testimonial');
        var thanks_anyway  = $('#live_form #thanks_anyway');
        var all=bad.add(ok).add(great).add(testimonial_parent).add(thanks_anyway); //shortcut for all wrapper elements


    }

</script>