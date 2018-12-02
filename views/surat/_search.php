<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_surat') ?>

    <?= $form->field($model, 'id_jenissurat') ?>

    <?= $form->field($model, 'id_kasus') ?>

    <?= $form->field($model, 'nomor_surat') ?>

    <?= $form->field($model, 'tgl_upload') ?>

    <?php // echo $form->field($model, 'path_surat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
