<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aduan */
?>
<div class="aduan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_lapor',
            'user',
            'unit',
            'isi_lapor',
            'jenis_rusak',
            'respon',
            'selesai',
            'tgl_lapor',
            'jam_lapor',
            'inven_id',
            'ganti_komp',
            'nama_komp',
            'teknisi',
            'Keterangan',
            'tgl_respon',
            'jam_respon',
            'tgl_selesai',
            'jam_selesai',
            'tindak_lanjut',
            'hapus',
        ],
    ]) ?>

</div>
