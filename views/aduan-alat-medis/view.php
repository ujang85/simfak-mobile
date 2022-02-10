<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMedis */
?>
<div class="alat-medis-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'inven_rs',
            'pemakai.user',
            'nama_alat',
            'lokasi_brg',
            'merk_type',
            'no_seri',
            'teknisi.nama_teknisi',
        ],
    ]) ?>

</div>
