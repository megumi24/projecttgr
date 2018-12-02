<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kasus;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\RincianPembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
(function($, undefined) {

    "use strict";

    // When ready.
    $(function() {
        
        var $form = $( "#form" );
        var $input = $form.find( "amount" );

        $input.on( "keyup", function( event ) {
            
            
            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
        } );
        
        /**
         * ==================================
         * When Form Submitted
         * ==================================
         */
        $form.on( "submit", function( event ) {
            
            var $this = $( this );
            var arr = $this.serializeArray();
        
            for (var i = 0; i < arr.length; i++) {
                    arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
            };
            
            console.log( arr );
            
            event.preventDefault();
        });
        
    });
})(jQuery);
</script>


<div class="rincian-pembayaran-form">

    <?php $form = ActiveForm::begin(['id' => 'form']); ?>


    <?= $form->field($model, 'ntpn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pembayaran')->textInput(['id' => 'amount'])->label('Jumlah yang dibayarkan') ?>

    <?= $form->field($model, 'tgl_bayar')->widget(DatePicker::classname(), [
        'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
