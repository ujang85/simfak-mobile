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
            'nama_gedung',
            'jml_lantai',
            'no_imb',
            'teknisi.nama_teknisi',
        ],
    ]) ?>

</div>
