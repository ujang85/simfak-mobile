<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMedis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alat-medis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inven_rs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inven_bmn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inven_pemda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pemakai')->textInput() ?>

    <?= $form->field($model, 'nama_alat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi_brg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_seri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pj_teknisi')->textInput() ?>

    <?= $form->field($model, 'th_pengadaan')->textInput() ?>

    <?= $form->field($model, 'hrg_peroleh')->textInput() ?>

    <?= $form->field($model, 'tgl_kalibrasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periode_pm')->textInput() ?>

    <?= $form->field($model, 'waktu')->dropDownList([ '1' => 'HARI','7' => 'MINGGU', '30' => 'BULAN', '365' => 'TAHUN', ]) ?>

    <?= $form->field($model, 'status_milik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_suplayer')->textInput() ?>

    <?= $form->field($model, 'resiko')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'th_pasang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kondisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hapus')->dropDownList([ 'T' => 'T', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sb_dana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_group')->textInput() ?>

    <?= $form->field($model, 'tgl_peroleh')->textInput() ?>

    <?= $form->field($model, 'habis_garansi')->textInput() ?>

    <?= $form->field($model, 'habis_kso')->textInput() ?>

    <?= $form->field($model, 'ket_fungsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prod_negara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asal_peroleh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teknologi')->dropDownList([ 'SEDERHANA' => 'SEDERHANA', 'MENENGAH' => 'MENENGAH', 'TINGGI' => 'TINGGI', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'periode_kl')->textInput() ?>

    <?= $form->field($model, 'kalibrasi')->dropDownList([ 'PERLU' => 'PERLU', 'TDK PERLU' => 'TDK PERLU', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'satuan_periodepm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konversi_pm')->textInput() ?>

    <?= $form->field($model, 'life_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_tahun')->textInput() ?>

    <?= $form->field($model, 'satuan_periodekl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konversi_kl')->textInput() ?>

    <?= $form->field($model, 'pm_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket_pm_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kalibrasi_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_org')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
