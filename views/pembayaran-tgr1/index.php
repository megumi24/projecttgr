<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran TGR';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-tgr-index">

	<button onclick="search()" class="btn btn-default" style=" float:right;">Pencarian</button>
	<br/>
	<div id="search" style="display : none;">
		<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	</div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'nama' => $nama,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nomor_sktjm',
            'jenis_peristiwa',
            // [
            //     // 'label' => '',
            //     'attribute' => 'nama',
            //     'value' => function ($nama),
            // ],
            'nip',
            'nama',
            'satuan_kerja',
            'tata_cara:ntext',
            'target_memenuhi',
            //'periode',
            //'total',
            //'sisa_pembayaran',
            //'status_cicilan:ntext',
            // 'ntpn',
            // 'pembayaran',
            // 'kode_satker',
            // 'status',

            // ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
								['pembayaran-tgr/view','nomor_sktjm'=>$model['nomor_sktjm'], 'id'=>$model['id']], 
								['title' => Yii::t('app', 'View File')]
						);
                    },
                    /* 'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon glyphicon-pencil"></span>', 
								['pembayaran-tgr/update','id'=>$model['id']],
								['title' => Yii::t('app', 'Edit File')]
						);
                    } */
                ],
            ],
        ],
    ]); ?>
</div>

<script>
function search() {
    var x = document.getElementById("search");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
