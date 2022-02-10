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
        'header' => 'No',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'inven_rs',
    ],
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nama_gedung',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jml_lantai',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'luas_l1',
     ],
     [
       'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'luas_l2',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'no_imb',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'no_ipb',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'width' => '60px',
         'attribute' => 'pj_teknisi',
         'value' => 'teknisi.nama_teknisi',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'th_pendirian',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'th_penggunaan',
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