<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rekonsiliasi */

$this->title = 'Create Rekonsiliasi';
$this->params['breadcrumbs'][] = ['label' => 'Rekonsiliasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekonsiliasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
