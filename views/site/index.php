<?php
  use yii\helpers\Html;
  use yii\bootstrap\Carousel;
?>

<?php

/* @var $this yii\web\View */

$this->title = 'Sistem Kerugian Negara';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <title>SIRINE</title>
</head>
<body>
      <?php
        echo Carousel::widget([
          'items' => [
            ['content' => Html::img('bps.jpg')],
            // ['content' => Html::img('tes2.jpg')],
          ]
        ]);
      ?>
      <br>

      <div class="row">
        <div class="col-sm-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <b>Beranda</b>
            </div>
            <div class="panel-body">
              <p>Selamat Datang di Sistem Ganti Rugi Negara</p>
              <p>Badan Pusat Statistik</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              tes
            </div>
            <div class="panel-body">
              tes
            </div>
          </div>
        </div>
      </div>

      <!-- <?php
        // echo Carousel::widget([
          // 'items' => [
            // ['content' => '<img src="<?= Yii::$app->request->baseUrl; ?>/tes.jpg"/>'],
            ['content' => '<img src="<?= Yii::$app->request->baseUrl; ?>/tes.jpg"/>'],
          ]
        ]);
      ?> -->

      <!-- <?php
        // $this->widget('bootstrap.widgets.TbCarousel', array(
          // 'items'=>array(
          //   array(
          //     'image'=>'<?= Yii::$app->request->baseUrl; ?>/tes.jpg',
          //     'label'=>'First Slide',
          //     'caption'=>'testes'),
          //   array(
          //     'image'=>'<?= Yii::$app->request->baseUrl; ?>/tes.jpg',
          //     'label'=>'Second Slide',
          //     'caption'=>'testes'),
          //   array(
          //     'image'=>'<?= Yii::$app->request->baseUrl; ?>/tes.jpg',
          //     'label'=>'Third Slide',
          //     'caption'=>'testes'),
          // ),
        ));
      ?> -->

</body>
</html>
