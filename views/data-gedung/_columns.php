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
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'habis_garansi',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'sb_dana',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'cost_tahun',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ket_fungsi',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'tgl_renov_akhir',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'periode_pm',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'pm1',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'kondisi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'cost_tahun',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ket_pm_akhir',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_org',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'hapus',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Hapus data',
                          'data-confirm-message'=>'yakin mau menghapus ?'], 
    ],

];   