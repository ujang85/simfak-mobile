<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput() ?>

    <?= $form->field($model, 'isi_lapor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_rusak')->textInput() ?>

    <?= $form->field($model, 'respon')->textInput() ?>

    <?= $form->field($model, 'selesai')->textInput() ?>

    <?= $form->field($model, 'tgl_lapor')->textInput() ?>

    <?= $form->field($model, 'jam_lapor')->textInput() ?>

    <?= $form->field($model, 'inven_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ganti_komp')->textInput() ?>

    <?= $form->field($model, 'nama_komp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teknisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_respon')->textInput() ?>

    <?= $form->field($model, 'jam_respon')->textInput() ?>

    <?= $form->field($model, 'tgl_selesai')->textInput() ?>

    <?= $form->field($model, 'jam_selesai')->textInput() ?>

    <?= $form->field($model, 'tindak_lanjut')->textInput() ?>

    <?= $form->field($model, 'hapus')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
