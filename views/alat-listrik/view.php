<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMedis */
?>
<div class="alat-medis-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_alat',
            'inven_rs',
            'inven_bmn',
            'inven_pemda',
            'pemakai.user',
            'nama_alat',
            'lokasi_brg',
            'merk_type',
            'no_seri',
            'teknisi.nama_teknisi',
            'th_pengadaan',
            'hrg_peroleh',
            'tgl_kalibrasi',
         //   'periode_pm',
            'status_milik',
            'suplayer.nama_spl',
            'resiko',
            'th_pasang',
            'pm1',
            'kondisi',
        //    'hapus',
            'sb_dana',
        //    'kode_group',
            'tgl_peroleh',
            'habis_garansi',
            'habis_kso',
            'ket_fungsi',
            'prod_negara',
            'asal_peroleh',
            'teknologi',
        //    'periode_kl',
            'kalibrasi',
         //   'satuan_periodepm',
         //   'konversi_pm',
            'life_time',
            'cost_tahun',
        //    'satuan_periodekl',
        //    'konversi_kl',
            'pm_akhir',
        //    'ket_pm_akhir',
            'kalibrasi_akhir',
          //  'id_org',
        ],
    ]) ?>

</div>
