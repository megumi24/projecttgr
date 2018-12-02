<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- new -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/webpict/favsirine.png" type="image/x-icon" /> 
	<title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php //echo Yii::$app->user->getIdentity()->level.'fgfgfhgjgjhjg' ?>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        // 'brandLabel' => 'Home',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',   
        ],
    ]);
    
  if(!Yii::$app->user->isGuest){
     // if(Yii::$app->user->getIdentity()->level==1) {
         // if(!Yii::$app->user->isGuest){
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            // ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Beranda', 'url' => ['/site/index']],
            
            ['label' => 'Kasus','url' => ['/kasus/index'], 'visible' => Yii::$app->user->getIdentity()->level==1 || Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==3],
            
           /* ['label' => 'Pembayaran', 'visible' => Yii::$app->user->getIdentity()->level==1 || Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==5, 
            
                'items' => [
                ['label' => 'Pilih Kasus', 'url' => ['/kasus/pilihkasus']],
                ['label' => 'Riwayat Pembayaran', 'url' => ['/rincian-pembayaran/index']],
                ['label' => 'Pencarian Transaksi', 'url' => ['/rincian-pembayaran/search']],
                ],
                ],*/
			
            ['label' => 'Debitur', 'url' => ['/debitur/index'], 'visible' => Yii::$app->user->getIdentity()->level==1 || Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==3],


			// ['label' => 'Surat', 'url' => ['/surat/index'], 'visible' => Yii::$app->user->getIdentity()->level==1],
			
				
            // ['label' => 'Rekonsiliasi', 'url' => ['/site/rekon'], 'visible' => Yii::$app->user->getIdentity()->level==3],
		],
    ]);
    if (Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==5) {
        $modelsatker = new app\models\Satker;
        $namalogin = $modelsatker->getNamaSatkerById(Yii::$app->user->identity->username);
    }
    else if (Yii::$app->user->getIdentity()->level==6) {
        $modelsatker = new app\models\Wilayah;
        $namalogin = $modelsatker->getNamaWilayahById(Yii::$app->user->identity->username);
    }
    else {
        $namalogin = Yii::$app->user->identity->username;
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
             Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' .$namalogin. ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ]
    ]);
    

    
}
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Badan Pusat Statistik  <?= date('Y') ?></p>
        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
