<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Suplayer;
use app\models\Teknisi;
use app\models\Pemakai;
use kartik\date\DatePicker;
use kartik\number\NumberControl;


$dispOptions = ['class' => 'kv-saved'];
 
$saveOptions = [
    'type' => 'text', 
    'label'=>'<label>Saved Value: </label>', 
    'class' => 'kv-saved',
    'readonly' => true, 
    'tabindex' => 1000
];
 
$saveCont = ['class' => 'kv-saved-cont'];
/* @var $this yii\web\View */
/* @var $model app\models\AlatMedis */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout
          //  'id_alat'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'id alat..']],
           // 'inven_rs'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris RS..']],
            'nama_alat'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris BMN..']]
            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout
          //  'id_alat'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'id alat..']],
            'inven_rs'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris RS..']],
            'inven_bmn'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris RS..']],
            'inven_pemda'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris BMN..']]
            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout
                'id_pemakai'=>[
                                 'type'=>Form::INPUT_DROPDOWN_LIST, 
                                 'items'=> ArrayHelper::map(Pemakai::find()->all(),'id','user'),
                            ],
            'merk_type'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'merk_type..']]
            
            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout
          //  'id_alat'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'id alat..']],
            'no_seri'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO seri..']],
            'lokasi_brg'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'lokasi..']]
            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout  hrg_peroleh
            'pj_teknisi'=>[
                            'type'=>Form::INPUT_DROPDOWN_LIST, 
                                 'items'=> ArrayHelper::map(Teknisi::find()->all(),'id_tek','nama_teknisi'),
                            ],
                                 
          'th_pengadaan'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'tahun -pengadaan..']],
         'hrg_peroleh'=>[
         'type'=>Form::INPUT_WIDGET,
         'hint'=>'harga perolehan',
         'widgetClass'=>kartik\number\NumberControl::classname(),
          'options' => ['pluginOptions' => ['options' => $saveOptions,'displayOptions' => $dispOptions]]
           ],
         ]
       ]);
     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout  'waktu  status_milik
         'periode_pm'=>[
         'type'=>Form::INPUT_WIDGET,
         'hint'=>'periode PM',
         'widgetClass'=>kartik\number\NumberControl::classname(),
         // 'options'=>['placeholder'=>'periode PM..','hint'=>'periode perawatan',]],
          'options' => ['pluginOptions' => ['options' => $saveOptions,'displayOptions' => $dispOptions]]


           ],
        
        'satuan_periodepm'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>['1' => 'HARI','7' => 'MINGGU', '30' => 'BULAN', '365' => 'TAHUN'],              
                  ],
        'status_milik'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>['INTERNAL' => 'INTERNAL','KSO' => 'KSO'],              
                  ],
      
        ]
    ]);


     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout      
        'id_suplayer'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=> ArrayHelper::map(Suplayer::find()->all(),'id_suplayer','nama_spl'),             
                  ],
        'resiko'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>['RENDAH' => 'RENDAH','SEDANG' => 'SEDANG','TINGGI' => 'TINGGI'],              
                  ],
        'th_pasang'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'tahun pasang..']]
      
        ]
    ]);

     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout
         'sb_dana'=>[
            'type'=>Form::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\select2\Select2', 
            'options'=>['data'=>$model->sumberDana,'class'=>'col-md-8'], 
            'hint'=>'pilih Sumber Dana',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ],
        
        'habis_garansi'=>[
            'type'=>Form::INPUT_WIDGET,
            'widgetClass'=>\kartik\widgets\DatePicker::classname(),
            'hint'=>'tgl habis garansi (tahun/bulan/tanggal)',
            'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]]
            
        ],

        'habis_kso'=>[
            'type'=>Form::INPUT_WIDGET,
            'widgetClass'=>\kartik\widgets\DatePicker::classname(),
            'hint'=>'tgl habis garansi (tahun/bulan/tanggal)',
            'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]]
            
        ],
     
    ]
    ]);

     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>2,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout
         'teknologi'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>['SEDERHANA' => 'SEDERHANA','MENENGAH' => 'MENENGAH','TINGGI' => 'TINGGI'],              
                  ],


         'ket_fungsi'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'keterangan fungsi..','class'=>'col-md-8']]
        
        
    ]
    ]);


     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout  'waktu  status_milik
          
        'prod_negara'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'produksi negara..']],
        
        
        'asal_peroleh'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>['PEMBELIAN' => 'PEMBELIAN','HIBAH' => 'HIBAH', 'KSO' => 'KSO'],              
                  ],     
        ]
        ]);

?>
<?php ActiveForm::end(); ?>



 