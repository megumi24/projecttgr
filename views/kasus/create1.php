<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\JenisKerugian;


/* @var $this yii\web\View */
/* @var $model app\models\KasusTgr */

$this->title = 'Lapor Kasus TGR';
$this->params['breadcrumbs'][] = ['label' => 'Kasus TGR', 'url' => ['index']];
?>
<div class="kasus-tgr-create">

    <h1><?= $model->jenisKerugian->jenis_kerugian ?></h1>
	
	<?= $this->render('_form', [
        'model' => $model,
		'modelDokumen' => $modelDokumen
    ]) ?>
    
</div>

