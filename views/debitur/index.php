<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DebiturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Debitur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitur-index">

    <h1>Daftar Debitur</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambahkan Debitur Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_debitur',
            'jenis_debitur',
            'nama',
            'NIP',
            'alamat',
            'email:email',

            [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            'options'=>['class'=>'action-column'],
            'template' => '{update}  {hapus}',
            'buttons' => [
                'update' => function($url,$model,$key){
                            $btn = Html::a("<span class='glyphicon glyphicon-pencil'></span>",
                            ['update', 'id'=>$model->id_debitur],
                            ['title' => Yii::t('app', 'Perbaharui Debitur')]
                        );
                    return $btn;
                },
                'hapus' => function($url,$model,$key){
                            $btn = Html::a("<span class='glyphicon glyphicon-trash'></span>",
                            ['delete', 'id'=>$model->id_debitur],
                            ['title' => Yii::t('app', 'Hapus Debitur')]
                        );
                    return $btn;
                },
            ],
        ],
        ],
    ]); ?>
</div>
