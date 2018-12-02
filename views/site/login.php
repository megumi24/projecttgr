<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="site-login", style="text-align: center"> -->
    <div class="row" style="height: 100%">
        <div class="col-md-6" style="height: 100%; align-items: center; position: relative; vertical-align: middle;">
            <div class="login-box", style="text-align: center; vertical-align: middle;">
                <div class="login-logo">
                    <img src="<?= Yii::$app->request->baseUrl; ?>/fixloginsirine.png" alt="" class="" max-width="250px" height="100px" text-align="center"><!-- responsive-img valign profile-image-login -->
                    <h3 class="center login-form-text", style= "font-size: 1">
                        <b>SISTEM GANTI RUGI NEGARA</b> <br>Badan Pusat Statistik
                    </h3>
                </div>
            </div>
        </div>
        <div class = "col-md-6" style="align-items: center; position: relative;">
            <div class="login-box-body">
                <div class="panel panel-default" style="max-width: 1000px">
                    <div class="panel-heading" style="text-align: center;">
                        <b>Login</b>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-offset-1 col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-4 control-label'],
                            ],
                        ]); ?>

                        <br>
                        <div style="text-align: center">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </div>
                        <div style="text-align: center">
                                <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div style="text-align: center">
                                <!-- <?= $form->field($model, 'rememberMe')->checkbox([
                                    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-6\">{error}</div>",
                                ]) ?> -->
                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-11">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
    <?php ActiveForm::end(); ?>

