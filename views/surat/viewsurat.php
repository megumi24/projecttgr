<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\MasterSuratSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-index">

<h1><?= Html::encode($this->title) ?></h1>
<br/>

<div class="row">
	
	<!-- <div class="col-md-2 col-xs-2"> -->
			<!-- <nav class="sidebar-nav">
		<ul class="nav">
		  <li class="nav-item"><a href="#canada">Semua Surat</a></li>
		  <li class="nav-item nav-dropdown">
			<a href="#" class="nav-link nav-dropdown-toggle">Jenis Surat</a>
			<ul class="nav-dropdown-items">
			<li class="nav-item"><a href="/" class="nav-link">a</a></li>
			<li class="nav-item"><a href="/" class="nav-link">b</a></li>
			<li class="nav-item"><a href="/" class="nav-link">c</a></li>
			</ul>
		  </li>
		  <a href="#australia">SPTGR</a>
		  <a href="#germany">SPGR-BMN</a>
		  <a href="#netherlands">Buat Surat</a>
		</ul>
		</nav> -->

		<!-- <div class="collection">
			<?= Html::a('Semua Surat', ['/'], ['class' => 'collection-item']) ?>
            <?= Html::a('Jenis Surat', ['/'], ['class' => 'collection-item']) ?>
		</div> -->

	
	<!-- </div> -->
	
	<!-- <div class="col-md-10 col-xs-10"> -->
		<?php
			$jenissurat = MasterSuratSearch::find()->all();
		?>
		<div class="btn-group">
			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
				Buat Surat
			<span class="caret"></span></button>
    		<ul class="dropdown-menu">
    			<?php foreach($jenissurat as $key): ?>
      			<li>
      				<?= Html::a($key->jenis_surat, ['/surat/create', 'idkasus'=>$id, 'idjenissurat'=>$key->id], ['class'=>'profile-link']
      				) ?>
      			</li>
      		<?php endforeach ?>
    		</ul>
		</div>
		<hr>
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
			'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
			'label' => 'Nomor SKTJM',
            'value' => 'kasus.nomor_sktjm',
            ],
			'nomor_surat',
            [
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
			'label' => 'Jenis Surat',
            'value' => 'jenissurat.jenis_surat',
            ],
			
           
            'tgl_upload',
            //'path_surat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<!-- </div> -->
	
</div>
</div>