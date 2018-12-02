<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\JenisKerugian;


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
 
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <br>

    <?= $form->field($model, 'status_kasus')->dropDownList([ '0' => 'Belum diproses', '1' => 'Dalam Proses' , '2' => 'Diproses', ], ['prompt' => '']) ?>
    
	<?= $form->field($model, 'nomor_sktjm')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'tata_cara')->dropDownList(
        ['0' => 'Cicilan', '1' =>  'Tunai', '2' => 'Potong Gaji' 
    	]);
    	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Buat' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>