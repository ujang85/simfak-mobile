<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pm */

$this->title = Yii::t('app', 'Update Pm: {name}', [
    'name' => $model->id_pm,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pm, 'url' => ['view', 'id' => $model->id_pm]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
