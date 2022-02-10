<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataGedung */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-gedung-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inven_rs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inven_bmn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inven_pemda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_gedung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jml_lantai')->textInput() ?>

    <?= $form->field($model, 'luas_l1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'luas_l2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_imb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ipb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pj_teknisi')->textInput() ?>

    <?= $form->field($model, 'th_pendirian')->textInput() ?>

    <?= $form->field($model, 'th_penggunaan')->textInput() ?>

    <?= $form->field($model, 'habis_garansi')->textInput() ?>

    <?= $form->field($model, 'sb_dana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anggaran_tahun')->textInput() ?>

    <?= $form->field($model, 'ket_fungsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_renov_akhir')->textInput() ?>

    <?= $form->field($model, 'periode_pm')->textInput() ?>

    <?= $form->field($model, 'pm1')->textInput() ?>

    <?= $form->field($model, 'kondisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_tahun')->textInput() ?>

    <?= $form->field($model, 'ket_pm_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_org')->textInput() ?>

    <?= $form->field($model, 'hapus')->dropDownList([ 'T' => 'T', 'Y' => 'Y', ], ['prompt' => '']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
