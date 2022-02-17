<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pm'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pm',
            'nomor_pm',
            'uraian_pm',
            'id_inven',
            'terjadwal_pm',
            //'tgl_pm',
            //'tgl_pm_berikut',
            //'teknisi',
            //'kondisi_alat',
            //'garansi_pm',
            //'masa_garansi_pm',
            //'periode_garansi',
            //'konversi_garansi',
            //'hapus',
            //'kode_pm',
            //'id_pengguna',
            //'group_id',
            //'id_alat',
            //'thn_pm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

