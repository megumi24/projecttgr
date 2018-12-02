<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <form action="surat-sptgr.php" method="post">
		<!-- $form->field($model, 'nomor')->textInput(['value'=>$nomor, 'readonly'=>true]) ?> -->
        <?= $form->field($model, 'nominal') ?>
        <?= $form->field($model, 'lamacicil') ?>
        <?= $form->field($model, 'blnawal') ?>
        <?= $form->field($model, 'blnakhir') ?>
        <?= $form->field($model, 'tglcicil') ?>
        

		<div class="form-group">
        	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    	</div>

<?php ActiveForm::end(); ?>
