<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Debitur */

$this->title = 'Buat Debitur';
$this->params['breadcrumbs'][] = ['label' => 'Debitur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
