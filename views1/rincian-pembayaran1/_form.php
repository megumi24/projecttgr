<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rincian-pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_sktjm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ntpn')->textInput() ?>

    <?= $form->field($model, 'pembayaran')->textInput() ?>

    <?= $form->field($model, 'kode_satker')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
