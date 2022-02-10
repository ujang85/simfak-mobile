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
use app\models\Aduan;
use kartik\date\DatePicker;
//use kartik\widgets\DatePicker;
use kartik\number\NumberControl;
use yii\widgets\DetailView;
use kartik\widgets\TimePicker;
//use kartik\time\TimePicker;


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

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'inven_rs',
            'nama_gedung',
            'jml_lantai',
            'no_imb',
            'teknisi.nama_teknisi',
           
        ],
    ]) ?>



<?php

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout
          //  'id_alat'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'id alat..']],
            'inven_rs'=>['type'=>Form::INPUT_HIDDEN, 'options'=>['placeholder'=>'NO inventaris RS..']]
            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout   
            'isi_lapor'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'isi lporan..']],
            'pelapor'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'nama pelapor..']]
            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'compactGrid'=>true,
        'attributes'=>[       // 2 column layout
         'tgl_lapor'=>[
            'type'=>Form::INPUT_WIDGET,
            'widgetClass'=>\kartik\date\DatePicker::classname(),
            'hint'=>'tgl lapor (tahun/bulan/tanggal)',
            'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]]
        ],
            'jam_lapor'=>[
            'type'=>Form::INPUT_WIDGET,
            'widgetClass'=>\kartik\time\TimePicker::classname(),
            'hint'=>'jam_lapor (jam/menit/detik)',
                'pluginOptions' => [
                'showSeconds' => true,
                'showMeridian' => false,
                'minuteStep' => 1,
                'secondStep' => 5,
            ]
            
        ],
        ]
    ]);

   

?>
<?php ActiveForm::end(); ?>



 