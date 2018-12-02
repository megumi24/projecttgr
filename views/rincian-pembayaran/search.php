<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KasusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pencarian Transaksi';
$this->params['breadcrumbs'][] = $this->title;
$modelsatker = new app\models\Satker;
$namasatker = $modelsatker->getNamaSatkerById(Yii::$app->user->identity->username);
?>
<div class="kasus-tgr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    
</div>
