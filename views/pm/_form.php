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

    <? /* echo odaialali\qrcodereader\QrReader::widget([
    'id' => 'qrInput',
    'successCallback' => "function(data){ $('#qrInput').val(data) }"
]); */ ?>




</div>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6724419004010752",
    enable_page_level_ads: true
    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-131906273-1');
  </script>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  
  
  <div class="container-fluid">
    <div class="row">
      
      
      <div class="col">
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <h1>QRCode Scanner</h1>
        <div class="col-sm-12">
          <video id="preview" class="p-1 border" style="width:100%;"></video>
        </div>

        
        <script type="text/javascript">

          function MM_goToURL() { //v3.0
            var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
            for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
          }

          var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
          scanner.addListener('scan',function(content){
            // alert(content);
            // window.location.href=content;
            MM_goToURL('parent',`cek-nomor-antrian.html?QrCode=${content}`);return document.MM_returnValue;
          });


          Instascan.Camera.getCameras().then(function (cameras){
            if(cameras.length>0){
              scanner.start(cameras[0]);
              $('[name="options"]').on('change',function(){

                if($(this).val()==1){
                  if(cameras[0]!=""){
                    scanner.start(cameras[0]);
                  }else{
                    alert('No Back camera found!');
                  }
                }

                else if($(this).val()==3){
                  if(cameras[1]!=""){
                    scanner.start(cameras[1]);
                  }else{
                    alert('No Back camera found!');
                  }
                }


                else if($(this).val()==2){
                  if(cameras[2]!=""){
                    scanner.start(cameras[2]);
                  }else{
                    alert('No Back camera found!');
                  }
                }

              });




            }

            else{
              console.error('No cameras found.');
              alert('No cameras found.');
            }
          }).catch(function(e){
            console.error(e);
            alert(e);
          });






        </script>


        
        <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">

          <label class="btn btn-primary active">
          <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
          </label>

          <label class="btn btn-secondary">
          <input type="radio" name="options" value="2" autocomplete="off"> Back Camera1
          </label>

          <label class="btn btn-secondary">
          <input type="radio" name="options" value="3" autocomplete="off"> Back Camera2
          </label>


        </div>
      </div>
    </div>
  </div>
</div>