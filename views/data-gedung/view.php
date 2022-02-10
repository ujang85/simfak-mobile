<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataGedung */
?>
<div class="data-gedung-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'inven_rs',
            'inven_bmn',
            'inven_pemda',
            'nama_gedung',
            'jml_lantai',
            'luas_l1',
            'luas_l2',
            'no_imb',
            'no_ipb',
            'teknisi.nama_teknisi',
            'th_pendirian',
            'th_penggunaan',
            'habis_garansi',
            'sb_dana',
            'cost_tahun',
            'ket_fungsi',
          //  'tgl_renov_akhir',
            'periode_pm',
          //  'pm1',
            'kondisi',
           // 'cost_tahun',
           // 'ket_pm_akhir',
           // 'id_org',
           // 'hapus',
        ],
    ]) ?>

</div>
