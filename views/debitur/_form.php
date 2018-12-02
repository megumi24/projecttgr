<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Debitur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="debitur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_debitur')->dropDownList(
        ['0' => 'Pegawai', '1' =>  'Non Pegawai' ],
        ['prompt'=>'',
                'onchange'=>'
                     if($(this).val() == 0){
                        $("#pgw").show();
                        $("#npg").hide();
                     }else{
                        $("#pgw").hide();
                        $("#npg").show();
                     }'
                ]);
    ?>

    <div id="pgw" style="display: none">
    
    <?= $form->field($model, 'NIP')->textInput() ?>

    </div>

    <div id="npg" style="display: none">
    
    <?= $form->field($model, 'nama')->textInput() ?>
    <?= $form->field($model, 'alamat')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
