<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Satker;

/* @var $this yii\web\View */
/* @var $model app\models\KasusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kasus-tgr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomor_sktjm') ?>

    <?= $form->field($model, 'kdsatker')->dropDownList(
			ArrayHelper::map(Satker::find()->all(),'kdsatker','nama_satker'),
			['prompt'=>''])->label('Satker') ?>
	
    <?= $form->field($model, 'tipe_kasus')->dropDownList([ 'TGR' => 'TGR', 'TP' => 'TP', ],['prompt'=>'']) ?>

    <?= $form->field($model, 'status_kasus')->dropDownList([ 'belum diproses' => 'Belum diproses', 'diproses' => 'Diproses'],['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
