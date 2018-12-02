<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <form action="surat-sptgr.php" method="post">
        <?= $form->field($model, 'thnsk') ?>
        <?= $form->field($model, 'nmrkasus') ?>
        <?= $form->field($model, 'penemuan') ?>
        <?= $form->field($model, 'nominalkerugian') ?>
        <?= $form->field($model, 'nama') ?>
        <?= $form->field($model, 'nip') ?>
        <?= $form->field($model, 'tglsuratpernyataan')->widget(DatePicker::classname(), [
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
        ]); ?>
		<div class="form-group">
        	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    	</div>

<?php ActiveForm::end(); ?>