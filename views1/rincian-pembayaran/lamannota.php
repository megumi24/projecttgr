<?php

use yii\helpers\Html;
?>

<div>
<p>
    <?= Html::a('Generate', ['generate', 'id'=>$kasus->id_kasus], ['class' => 'btn btn-primary']) ?>
</p>

<?= $this->render('nota', [
        'kasus' => $kasus,
        'model' => $model,
    ]) ?>

</div>