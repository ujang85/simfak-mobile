<?php

namespace app\controllers;

use Yii;
//use app\models\AlatMedis;
use app\models\AlatMedisSearch;
use app\models\AduanMedisSearch;
use app\models\AduanSearch;
use app\models\AlatRs;
use app\models\Aduan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use kartik\form\ActiveForm;
use kartik\mpdf\Pdf;

/**
 * AlatMedisController implements the CRUD actions for AlatMedis model.
 */
class AduanAlatMedisController extends Controller
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
        $searchModel = new AlatMedisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // utk setting pagination letakkan disini 
        $dataProvider->pagination->pageSize=5;

        $searchModel2 = new AduanMedisSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        // utk setting pagination letakkan disini 
        $dataProvider2->pagination->pageSize=5;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
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
                    'title'=> "Alat Medis #".$id,
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
        $aduan = new Aduan();  
        $alat = new AlatRs();     

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Laporan Kerusakan".$model->inven_id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load(Yii::$app->request->post())){

                     $aduan->id_alat = $model->kode_alat;
                     $aduan->inven_id = $model->inven_rs;
                     $aduan->user = Yii::$app->user->identity->id;
                     $aduan->unit = Yii::$app->user->identity->unit;
                     $aduan->isi_lapor = $model->isi_lapor;
                     $aduan->tgl_lapor = $model->tgl_lapor;
                     $aduan->jam_lapor = Yii::$app->formatter->asDate($model->jam_lapor,'php:His');  
                     $aduan->group_id = 2;                 
                     $aduan->save();
                    // var_dump($model->isi_lapor);
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Alat Medis #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Alat Medis #".$id,
                    'content'=>$this->renderAjax('update', [
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
                return $this->render('update', [
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
