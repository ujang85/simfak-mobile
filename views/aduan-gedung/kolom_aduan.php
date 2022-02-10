<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'header' => 'no',
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'inven_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
     //   'attribute'=>'nama_gedung',
        'header' => 'Nama gedung',
        'value'=>'data_alat.nama_gedung',
    ],
    [
         'class'=>'\kartik\grid\DataColumn',
      //   'attribute'=>'no_imb',
         'header' => 'No. IMB',
        'value'=>'data_alat.no_imb',
     ],
    
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'tgl_lapor',
         'format' => ['date', 'php:d-m-Y']
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jam_lapor',
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'isi_lapor',
     ],
    /*
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'data_alat.kode_group',
         'value' => function($model) { return $model->data_alat->kode_group=2 ;},
     ], */
     [
            //'label' => 'kirim',
            'format' => 'raw',
           'label' => 'cetak',
        'value' => function ($model) {
        
           // return Html::a($model['kd_lapor'], Url::to(['/aduan/view', 'id' => $model['kd_lapor']]),['data-pjax' => 0,'target' => '_blank']);
            return Html::a('<i class="fa fa-sign-out"></i> cetak laporan', ['/aduan-gedung/cetak','id' => $model['kd_lapor']],['data-pjax' => 0,'target' => '_blank']);
        }, 

        ],
    
   


];   