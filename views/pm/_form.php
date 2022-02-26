<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pm-form">

    <?php $form = ActiveForm::begin(); ?>

    <div>
    <div id="qr-reader" style="width:400px"></div>
    <div id="qr-reader-results"></div>
    </div>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete"
                || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;
            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                //    console.log(`Scan result ${decodedText}`, decodedResult);
                document.getElementById("id-input").value = decodedText;
                }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>

    <?= $form->field($model, 'id_alat')->textInput(['id'=>'id-input']) ?>
    <?= $form->field($model, 'nama_alat')->textInput() ?>
    <?= $form->field($model, 'merk_type')->textInput() ?>
    <?= $form->field($model, 'no_seri')->textInput() ?>

    <?= $form->field($model, 'uraian_pm')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'kondisi_alat')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>


<?php 
$script = <<< JS

 $('#id-input').change(function(){

    var alatId=$(this).val();
 //   alert(alatId);
   $.get('index.php?r=pm/get-alat',{ alatId : alatId },function(data2){
        var data2 = $.parseJSON(data2);
    //  alert(data2);
        $('#pm-nama_alat').attr('value',data2.nama_alat);
        $('#pm-merk_type').attr('value',data2.merk_type);
        $('#pm-lokasi_brg').attr('value',data2.lokasi_brg);
        $('#pm-no_seri').attr('value',data2.no_seri); 
      }); 
    });
JS;
$this->registerJs($script);
//$this->registerJs($script, $this::POS_END);
?>
