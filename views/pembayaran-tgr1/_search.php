<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Materi;

/* @var $this yii\web\View */
/* @var $model app\models\PanduanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panduan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

	 <?= $form->field($model, 'nip')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['panduan/index'],['class'=>'btn btn-default']);?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
