<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-tp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no')->textInput() ?>

    <?= $form->field($model, 'nomor_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIP')->textInput() ?>

    <?= $form->field($model, 'satuan_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
