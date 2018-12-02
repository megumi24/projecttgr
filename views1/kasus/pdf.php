<?php
use yii\bootstrap\Modal;
use yii\helpers\Url;

Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
]);

echo \yii2assets\pdfjs\PdfJs::widget([
  'url' => Url::base().'/downloads/manualStart_up.pdf'
]);

Modal::end();
?>