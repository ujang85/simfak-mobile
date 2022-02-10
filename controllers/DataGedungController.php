<?php

namespace app\controllers;

use Yii;
use app\models\DataGedungSearch;
use app\models\AlatRs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * AlatMedisController implements the CRUD actions for AlatMedis model.
 */
class DataGedungController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AlatMedis models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new DataGedungSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
     

        // utk setting pagination letakkan disini 
        $dataProvider->pagination->pageSize=10;
      

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           
        ]);
    }
    public function actionLapaset()
    {    
        $searchModel = new DataGedungSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lap_aset_medis', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single AlatMedis model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Data Gedung #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

   

    public function actionCreate()
    {
        $request = Yii::$app->request;
    //    $model = new AlatMedis();  
        $model = new AlatRs();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Tambah Data",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
            else if($model->load($request->post()) && $model->validate()){

                     $model->inven_rs = $model->inven_rs;
                     $model->inven_bmn = $model->inven_bmn;
                     $model->inven_pemda = $model->inven_pemda;
                     $model->nama_gedung = $model->nama_gedung;
                     $model->jml_lantai = $model->jml_lantai;
                     $model->luas_l1 = $model->luas_l1;
                     $model->luas_l2 = $model->luas_l2;
                     $model->no_imb = $model->no_imb;
                     $model->no_ipb = $model->no_ipb;
                     $model->pj_teknisi = $model->pj_teknisi;
                     $model->th_pendirian = $model->th_pendirian;
                     $model->th_penggunaan = $model->th_penggunaan;
                     $model->sb_dana = $model->sb_dana;
                     $model->habis_garansi = $model->habis_garansi;
                     $model->cost_tahun = $model->cost_tahun;
                     $model->ket_fungsi = $model->ket_fungsi;
                     $model->periode_pm = $model->periode_pm;
                     $model->satuan_periodepm = $model->satuan_periodepm;
                     $model->kode_group = '3';
                     $model->save();

                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Tambah Data",
                    'content'=>'<span class="text-success">Tambah Data success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Tambah Data",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->kode_alat]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }
    
    /**
     * Updates an existing AlatMedis model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Data #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->validate()){

                     $model->inven_rs = $model->inven_rs;
                     $model->inven_bmn = $model->inven_bmn;
                     $model->inven_pemda = $model->inven_pemda;
                     $model->nama_gedung = $model->nama_gedung;
                     $model->jml_lantai = $model->jml_lantai;
                     $model->luas_l1 = $model->luas_l1;
                     $model->luas_l2 = $model->luas_l2;
                     $model->no_imb = $model->no_imb;
                     $model->no_ipb = $model->no_ipb;
                     $model->pj_teknisi = $model->pj_teknisi;
                     $model->th_pendirian = $model->th_pendirian;
                     $model->th_penggunaan = $model->th_penggunaan;
                     $model->sb_dana = $model->sb_dana;
                     $model->habis_garansi = $model->habis_garansi;
                     $model->cost_tahun = $model->cost_tahun;
                     $model->ket_fungsi = $model->ket_fungsi;
                     $model->periode_pm = $model->periode_pm;
                     $model->satuan_periodepm = $model->satuan_periodepm;
                     $model->kode_group = '3';
                     $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Update Data",
                    'content'=>'<span class="text-success">Update Data success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Tambah Data ",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->kode_alat]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Delete an existing AlatMedis model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }



    public function actionGetAlat($invenId)
    {   
       // $barang=BarangBeli::find()->where(['id'=>$id])->one();
     //  $AlatRs=TbAlatRs::findOne($inven_rs='AM-0011');
       //   $Alat=TbAlatRs::findAll($invenId);
        $Alat=AlatRs::find()->where(['inven_rs'=>$invenId])->one();
        echo Json::encode($Alat);
        exit;
        
    }


    


    public function actionGetAlat2($alatId)
    {   
       // $barang=BarangBeli::find()->where(['id'=>$id])->one();
     //  $AlatRs=TbAlatRs::findOne($inven_rs='AM-0011');
       //   $Alat=TbAlatRs::findAll($invenId);
        $KodeAlat=AlatRs::find()->where(['kode_alat'=>$alatId])->one();
        echo Json::encode($KodeAlat);
        exit;
        
    }


     /**
     * Delete multiple existing AlatMedis model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the AlatMedis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlatMedis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlatRs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
