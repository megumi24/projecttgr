<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KasusTgr */

$this->title = 'Lapor Kasus TGR';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kasus', 'url' => ['index']];
?>
<div class="kasus-tgr-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<br/>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
