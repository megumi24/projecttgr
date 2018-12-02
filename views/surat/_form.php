<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kasus;
use app\models\MasterSurat;

/* @var $this yii\web\View */
/* @var $model app\models\Surat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_surat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
