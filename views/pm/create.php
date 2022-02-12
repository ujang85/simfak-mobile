<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pm */

$this->title = Yii::t('app', 'Preventiv Maintenance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pm-create">

    <h3><?= Html::encode($this->title) ?></h3>
<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
