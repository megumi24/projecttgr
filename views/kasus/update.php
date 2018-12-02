<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kasus */

$this->title = 'Update Kasus TGR: ' . $model->id_kasus;
$this->params['breadcrumbs'][] = ['label' => 'Kasus TGR', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kasus, 'url' => ['view', 'id' => $model->id_kasus]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kasus-tgr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
