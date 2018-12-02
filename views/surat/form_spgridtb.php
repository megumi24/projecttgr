<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <form action="surat-sptgr.php" method="post">
		<!-- $form->field($model, 'nomor')->textInput(['value'=>$nomor, 'readonly'=>true]) ?> -->
        <?= $form->field($model, 'nama') ?>
        <!-- nanti ganti pas udah disambungin kasus sama debitur-->
        <?= $form->field($model, 'tglpengundurandiri')->widget(DatePicker::classname(), [
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
        ]); ?>
        <?= $form->field($model, 'tglmemorandum')->widget(DatePicker::classname(), [
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
        ]); ?>
        <?= $form->field($model, 'tahunmasuk') ?>
        <?= $form->field($model, 'tahunlulus') ?>
        <?= $form->field($model, 'bulantuntas') ?>
        <?= $form->field($model, 'bulanbelum') ?>
        <?= $form->field($model, 'tahunakhirikatan') ?>
        <?= $form->field($model, 'nmrsuratperjanjian') ?>
        <?= $form->field($model, 'tglsuratperjanjian') ?>
        <?= $form->field($model, 'perihalsuratperjanjian') ?>
        <?= $form->field($model, 'besartgr') ?>

		<div class="form-group">
        	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    	</div>

<?php ActiveForm::end(); ?>
