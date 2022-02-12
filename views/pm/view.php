<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pm */

$this->title = $model->id_pm;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_pm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_pm], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pm',
            'nomor_pm',
            'uraian_pm',
            'id_inven',
            'terjadwal_pm',
            'tgl_pm',
            'tgl_pm_berikut',
            'teknisi',
            'kondisi_alat',
            'garansi_pm',
            'masa_garansi_pm',
            'periode_garansi',
            'konversi_garansi',
            'hapus',
            'kode_pm',
            'id_pengguna',
            'group_id',
            'id_alat',
            'thn_pm',
        ],
    ]) ?>

</div>
