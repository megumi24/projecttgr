<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <form action="surat-sptgr.php" method="post">
        <?= $form->field($model, 'thnsk') ?>
        <?= $form->field($model, 'nama') ?>
        <?= $form->field($model, 'nip') ?>
        <?= $form->field($model, 'nmrsuratsestama') ?>
        <?= $form->field($model, 'tglsuratsestama')->widget(DatePicker::classname(), [
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            // 'todayHighlight' => true
            'value' => $tglupload
        ]
        ]); ?>
        <?= $form->field($model, 'perihalsuratsestama') ?>
        <?= $form->field($model, 'nmrberitaacaratpkn') ?>
        <?= $form->field($model, 'tempatditetapkan') ?>
        <?= $form->field($model, 'tglditetapkan')->widget(DatePicker::classname(), [
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            // 'todayHighlight' => true
            'value' => $tglupload
        ]
        ]); ?>
<!-- 		<$form->field($model, 'tglupload')->widget(DatePicker::classname(), [
        	'value' => $tglupload,
        	'format' => 'yyyy-mm-dd',
        	'htmlOptions' => array('readonly'=>true)
    	]); ?> -->
        <!-- $form->field($model, 'tglupload')->widget(DatePicker::classname(), [
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            // 'todayHighlight' => true
            'value' => $tglupload
        ]
        ]); ?> -->
		<?= $form->field($model, 'bps')->textInput(['value'=>$bps, 'readonly'=>true]) ?>
		<?= $form->field($model, 'nama') ?>
		<?= $form->field($model, 'tglsktjm')->widget(DatePicker::classname(), [
        	'pluginOptions' => [
        	'format' => 'yyyy-mm-dd',
        	'todayHighlight' => true
    	]
    	]); ?>
		<?= $form->field($model, 'jmlangsuran') ?>

		<div class="form-group">
        	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    	</div>

<?php ActiveForm::end(); ?>
