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
       // 'header' => 'Nama Pengguna',
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
         'attribute'=>'th_pengadaan',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'hrg_peroleh',
     ],
     
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'tgl_kalibrasi',
     //],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'periode_pm',
         'value' => function($model) { return $model->periode_pm  . " " . $model->periode->satuan_periode ;},
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status_milik',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'id_suplayer',
         'value' => 'suplayer.nama_spl',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'pm_akhir',
         'header'=>'pm terakhir',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'resiko',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'th_pasang',
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
        // 'attribute'=>'hapus',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'sb_dana',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'kode_group',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'tgl_peroleh',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'habis_garansi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'habis_kso',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ket_fungsi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'prod_negara',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'asal_peroleh',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'teknologi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'periode_kl',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'kalibrasi',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'satuan_periodepm',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'konversi_pm',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'life_time',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'cost_tahun',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'satuan_periodekl',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'konversi_kl',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'pm_akhir',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ket_pm_akhir',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'kalibrasi_akhir',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_org',
    // ],

     /*
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
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],
    */

];   