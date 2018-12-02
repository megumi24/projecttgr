<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kasus;

/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rincian-pembayaran-search">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
		'action' => ['index'],
        'method' => 'get',
		'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-2',
                            'offset' => 'col-sm-offset-2',
                            'wrapper' => 'col-sm-4',
                        ],
                    ],
    ]); ?>

    <?= $form->field($model, 'id_kasus')->dropDownList(
			ArrayHelper::map(Kasus::find()->all(),'id_kasus','nomor_sktjm'),
			['prompt'=>''])->label('Nomor SKTJM') ?>
			
	<?= $form->field($model, 'id_kasus')->dropDownList(
			ArrayHelper::map(Kasus::find()->all(),'id_kasus','id_debitur'),
			['prompt'=>''])->label('NIP') ?>

    <div class="form-group" style= 'float: left; width: 150px;'>
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
