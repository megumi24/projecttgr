<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTgr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-tgr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_sktjm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kasus')->textInput() ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_pembayaran')->textInput() ?>

    <?= $form->field($model, 'kode_satker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pembayaran')->dropDownList([ 'lancar' => 'Lancar', 'macet' => 'Macet', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tata_cara')->dropDownList([ '0', '1', '2', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'target_memenuhi')->textInput() ?>

    <?= $form->field($model, 'periode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
