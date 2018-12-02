<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KasusTgr */

$this->title = 'Lapor Kasus TGR';
$this->params['breadcrumbs'][] = ['label' => 'Kasus TGR', 'url' => ['index']];
?>
<div class="kasus-tgr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_status', [
        'model' => $model
    ]) ?>

</div>
