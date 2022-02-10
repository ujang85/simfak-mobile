<?php
use yii\helpers\Url;
use yii\helpers\Html;
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_lapor',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'user',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'unit',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'isi_lapor',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jenis_rusak',
    ],
     [
            //'label' => 'kirim',
            'format' => 'raw',
           'label' => 'cetak',
        'value' => function ($model) {
        
         //   return Html::a($model['kd_lapor'], Url::to(['/aduan/cetak', 'id' => $model['kd_lapor']]),['data-pjax' => 0,'target' => '_blank']);
            return Html::a('<i class="fa fa-sign-out"></i> cetak laporan', ['/aduan/cetak','id' => $model['kd_lapor']],['data-pjax' => 0,'target' => '_blank']);
        }, 

        ],
   
    

];   