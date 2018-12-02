<?php 

use Yii;
use app\models\SuratBapTpkn;
use app\models\SuratTgr;
use app\models\InSktjmBmnTpkn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Surat';
$this->params['breadcrumbs'][] = $this->title;
 ?>

<div class="surat">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SuratBapTpkn::nomor',
            'InSktjmBmnTpkn::nomor_surat',
            // 'nama_pegawai:ntext',
            // 'NIP',
            // 'satuan_kerja',
            // 'total',

            ['class' => 'yii\grid\ActionColumn',
                // 'header'=>'Action',
                // 'template' => '{delete} {view} {update}',
                // 'buttons' => [
                //     'delete' => function ($url, $model) {
                //         return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                //                     'title' => Yii::t('app', 'Delete File'),
                                    
                //         ]);
                //     },
                //     'view' => function ($url, $model) {
                //         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                //                     'title' => Yii::t('app', 'View File'),
                //                     // 'target'=>'_blank',
                //         ]);
                //     },
                //     'update' => function ($url, $model) {
                //         return Html::a('<span class="glyphicon glyphicon glyphicon-pencil"></span>', $url, [
                //                     'title' => Yii::t('app', 'Edit File'),
                                   
                //         ]);
                //     }
                // ],
                // 'urlCreator' => function ($action, $model, $key, $index) {
                //     if ($action === 'delete') {
                //         $url = Yii::$app->getUrlManager()->createUrl('pembayaran-tp/delete'); // your own url generation logic
                //         return $url;
                //     }
                //     if ($action === 'view') {
                //         $url = Yii::$app->getUrlManager()->createUrl(['pembayaran-tp/view','nomor_surat'=>$model['nomor_surat']]); // your own url generation logic
                //         return $url;
                //     }
                //     if ($action === 'update') {
                //         $url = Yii::$app->getUrlManager()->createUrl(['pembayaran-tp/update','id'=>$model['no']]); // your own url generation logic
                //         return $url;
                //     }
                // }    
            ],
        ],
    ]); ?>
</div>