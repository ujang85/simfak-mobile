<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataGedungSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Gedung';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<br>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus">  Tambah Data Gedung</i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Tambah Data Gedung','class'=>'btn btn-default']) ?>
    </p>
</br>
<div class="data-gedung-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
        /*    'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Tambah Data Gedung','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],        */  
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Data Gedung',
            /*    'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Hapus Semua',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Hapus Data',
                                    'data-confirm-message'=>'Yakin Hapus Data item ini?'
                                ]),
                        ]).       */                 
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>

<?php Pjax::begin(['id' => 'CrudModal']) ?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
<?php Pjax::end() ?>
