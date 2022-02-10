<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dokumen */
?>
<div class="dokumen-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jenis_dokumen',
        ],
    ]) ?>

</div>
