<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;

$this->title = 'Rekonsiliasi';
?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="site-rekon">

<h1><?= Html::encode($this->title) ?></h1>

	<div class="jumbotron">
        <p class="lead">Silahkan klik tombol berikut untuk melakukukan rekonsiliasi</p>
        <p><button type="button" class="btn btn-primary btn-lg">Proses</button></p>
        <div class="jumbotron">
        	<center><!-- table style ="width: 50%" border="solid black">
        		<tr>
        			<th>TGR Tahun A SIRINE</th>
        			<th>TGR Tahun A SAIBA</th>
        		</tr>
        		<tr>
        			<th>A</th>
        			<th>B</th>
        		</tr>
        	</table> -->
        	<br>
  			<?php  
  			echo Nav::widget([
    			'options' => ['class' => 'nav nav-pills nav-stacked'],
    			'items' => [
    				['label' => 'Lihat Data Berbeda', 'url' => ['/rekonsiliasi/index']],
    				['label' => 'Lihat Data Keseluruhan', 'url' => ['/rekonsiliasi/index']],
    		],	
			]);
			?>
		</center></div>

        </div>	
        <!-- <p>TGR Tahun A SAIBA </p> -->
</div>