<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'header' => 'no',
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'inven_rs',
    ],
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'header' => 'Nama Pengguna',
        'attribute'=>'id_pemakai',
        'value' => 'pemakai.user',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'nama_alat',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'lokasi_brg',
         'header' => 'Lokasi',
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'merk_type',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'no_seri',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'pj_teknisi',
         'value' => 'teknisi.nama_teknisi',
     ],
     
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'periode_pm',
         'value' => function($model) { return $model->periode_pm  . " " . $model->periode->satuan_periode ;},
     ],
   
   [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'header' => 'INPUT ADUAN',
        'template' => '{update}',
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
      
        'updateOptions'=>['role'=>'modal-remote','title'=>'INPUT ADUAN', 'data-toggle'=>'tooltip'],
       
    ], 

];   