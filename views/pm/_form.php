<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use odaialali\qrcodereader\QrReader;

/* @var $this yii\web\View */
/* @var $model app\models\Pm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pm-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'id_alat')->textInput() ?>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus">  Scan QrCode</i>', ['create'],
                    ['role'=>'modal-remote','class'=>'btn btn-danger']) ?>
    </p>
    <br>
 

    <?= $form->field($model, 'uraian_pm')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'kondisi_alat')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?  echo odaialali\qrcodereader\QrReader::widget([
    'id' => 'qrInput',
    'successCallback' => "function(data){ $('#qrInput').val(data) }"
]); ?>


</div>
