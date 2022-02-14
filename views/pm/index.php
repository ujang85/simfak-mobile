<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pm'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pm',
            'nomor_pm',
            'uraian_pm',
            'id_inven',
            'terjadwal_pm',
            //'tgl_pm',
            //'tgl_pm_berikut',
            //'teknisi',
            //'kondisi_alat',
            //'garansi_pm',
            //'masa_garansi_pm',
            //'periode_garansi',
            //'konversi_garansi',
            //'hapus',
            //'kode_pm',
            //'id_pengguna',
            //'group_id',
            //'id_alat',
            //'thn_pm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

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





</div>
