<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\KasusTgr;
use app\models\KasusTp;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RincianPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rincian-pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); 
	?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_kasus',
			'tipe_kasus',
			'nomor_sktjm',
			'id_debitur',
			

            ['class' => 'yii\grid\ActionColumn',
            'options'=>['class'=>'action-column'],
            'template'=>'{lihat} {download} {bahas}',
            'buttons' => [
                'lihat' => function($url,$model,$key){
                            $btn = Html::a("<span class='glyphicon glyphicon-eye-open'></span>",
                            ['rincian-pembayaran/rincian', 'id'=>$model->id_kasus],
                            ['title' => Yii::t('app', 'Lihat Detail Kasus')]
                        );
                    return $btn;
                },
            ],
            ],
        ],
    ]); ?>
</div>
