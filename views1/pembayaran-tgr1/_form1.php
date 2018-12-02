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

    <?= $form->field($model, 'jenis_peristiwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satuan_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tata_cara')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'target_memenuhi')->textInput() ?>

    <?= $form->field($model, 'periode')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'sisa_pembayaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_cicilan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ntpn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pembayaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_satker')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
