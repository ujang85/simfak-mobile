<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Teknisi;
use app\models\SumberDana;
use kartik\date\DatePicker;
use kartik\number\NumberControl;


$dispOptions = ['class' => 'form-control kv-monospace'];
 
$saveOptions = [
    'type' => 'text', 
    'label'=>'<label>Saved Value: </label>', 
    'class' => 'kv-saved',
    'readonly' => true, 
    'tabindex' => 1000
];
 
$saveCont = ['class' => 'kv-saved-cont'];

/* @var $this yii\web\View */
/* @var $model app\models\DataGedung */
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
        'inven_rs'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris RS..']],
        'inven_bmn'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris BMN..']],
        'inven_pemda'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'NO inventaris PEMDA..']]
    ]
]);

echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>2,
    'compactGrid'=>true,
    'attributes'=>[       // 2 column layout
        'nama_gedung'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Masukan Nama Gedung..']],
        'jml_lantai'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Masukan jumlah lantai..']]
       
    ]
]);

echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>4,
    'compactGrid'=>true,
    'attributes'=>[       // 2 column layout
        'luas_l1'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>' lantai 1']],
        'luas_l2'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>' lantai 2']],
        'no_imb'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'No IMB']],
        'no_ipb'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'No IPB']]
    ]
]);
echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'compactGrid'=>true,
    'attributes'=>[       // 2 column layout
        //'pj_teknisi'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Masukan Nama Gedung..']],
                'pj_teknisi'=>[
            'type'=>Form::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\select2\Select2', 
            'options'=>['data'=> ArrayHelper::map(Teknisi::find()->all(),'id_tek','nama_teknisi')], 
            'hint'=>'pilih teknisi',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ],

        'th_pendirian'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Masukan tahun pendirian']],
        'th_penggunaan'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Masukan tahun penggunaan']]
        
    ]
]);

    echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>2,
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
        //'habis_garansi'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Masukan jumlah lantai..']],
       // 'anggaran_tahun'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'anggaran pertahun..','class'=>'col-md-8']]
        
    ]
]);

    echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout
         'cost_tahun'=>[
         'type'=>Form::INPUT_WIDGET,
         'widgetClass'=>kartik\number\NumberControl::classname(),
          'options' => ['pluginOptions' => ['options' => $saveOptions,'displayOptions' => $dispOptions,'maskedInputOptions' =>[
        'prefix' => 'Rp','sufix' => '$']]]
           ],
           'periode_pm'=>[
         'type'=>Form::INPUT_WIDGET,
        // 'hint'=>'periode PM',
         'widgetClass'=>kartik\number\NumberControl::classname(),
          'options' => ['pluginOptions' => ['options' => $saveOptions,'displayOptions' => $dispOptions]]
           ],
           'satuan_periodepm'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>['1' => 'HARI','7' => 'MINGGU', '30' => 'BULAN', '365' => 'TAHUN'],              
                  ],
    ]
]);
     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>1,
    'compactGrid'=>false,
    'attributes'=>[       // 2 column layout
      'ket_fungsi'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'keterangan fungsi..','class'=>'col-md-8']]   
    ]
]);

?>


<?php ActiveForm::end(); ?>
    
















































