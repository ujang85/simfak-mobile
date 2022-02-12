<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pm') ?>

    <?= $form->field($model, 'nomor_pm') ?>

    <?= $form->field($model, 'uraian_pm') ?>

    <?= $form->field($model, 'id_inven') ?>

    <?= $form->field($model, 'terjadwal_pm') ?>

    <?php // echo $form->field($model, 'tgl_pm') ?>

    <?php // echo $form->field($model, 'tgl_pm_berikut') ?>

    <?php // echo $form->field($model, 'teknisi') ?>

    <?php // echo $form->field($model, 'kondisi_alat') ?>

    <?php // echo $form->field($model, 'garansi_pm') ?>

    <?php // echo $form->field($model, 'masa_garansi_pm') ?>

    <?php // echo $form->field($model, 'periode_garansi') ?>

    <?php // echo $form->field($model, 'konversi_garansi') ?>

    <?php // echo $form->field($model, 'hapus') ?>

    <?php // echo $form->field($model, 'kode_pm') ?>

    <?php // echo $form->field($model, 'id_pengguna') ?>

    <?php // echo $form->field($model, 'group_id') ?>

    <?php // echo $form->field($model, 'id_alat') ?>

    <?php // echo $form->field($model, 'thn_pm') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
