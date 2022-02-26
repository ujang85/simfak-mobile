<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset; 
use hoaaah\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlatMedisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alat Medis';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>


<div class="alat-medis-index">
    <div>
        <?=GridView::widget([
          //  'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => '',
            'pager' => [
            'firstPageLabel' => 'Awal',
            'lastPageLabel'  => 'Akhir'
                        ],
          //  'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
         /*    'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Alat Medis','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],         */   
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Alat Medis',
              /*     'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).       */                   
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>

    <div  id="ajaxCrudDatatable">
        
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider2,
            'filterModel' => $searchModel2,
            'summary' => '',
            'pager' => [
            'firstPageLabel' => 'Awal',
            'lastPageLabel'  => 'Akhir'
                        ],
            'pjax'=>true,
            'columns' => require(__DIR__.'/kolom_aduan.php'),
         
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> DATA LAPORAN KERUSAKAN',
                       
                        '<div class="clearfix"></div>',
            ]
        ])?>
        
    </div>




</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",

    "footer"=>"",// always need it for jquery plugin
    "options" => [
        "tabindex" => false, // important for Select2 to work properly
      //  "style"=>"overflow:hidden;"
     //   "style"=>"overflow:auto;"
    ], 
])?>
<?php Modal::end(); ?>
