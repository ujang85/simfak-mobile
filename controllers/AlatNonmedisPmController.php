<?php

namespace app\controllers;

use Yii;
//use app\models\AlatMedis;
use app\models\AlatNonmedisPMSearch;
use app\models\AlatRs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use app\models\JadwalPm;

/**
 * AlatMedisController implements the CRUD actions for AlatMedis model.
 */
class AlatNonmedisPmController extends Controller
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
        $searchModel = new AlatNonmedisPMSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // utk setting pagination letakkan disini 
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           
        ]);
    }
  
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Pemakai #".$id,
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
     * Displays a single AlatMedis model.
     * @param integer $id
     * @return mixed
     */
   
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $jadwal = new JadwalPm();       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Jadwal PM Sarana Nonmedis ",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load(Yii::$app->request->post()))
                    {
                    	
                     $jadwal->inven_id =$model->inven_rs;
                     $jadwal->ket_pm ='PM-1';
                     $jadwal->kode_group =5;
                     $jadwal->jadwal_pm =$model->pm_akhir;
                     $jadwal->bulan =Yii::$app->formatter->asDatetime($model->pm_akhir, 'php:m');
                     $jadwal->tahun =Yii::$app->formatter->asDatetime($model->pm_akhir, 'php:Y');  
                     $jadwal->id_pengguna =$model->id_pemakai;
                     $jadwal->id_alat =$model->kode_alat;
                     $jadwal->save(); 
                     $model->jadwal_pm ='1';
                     $model->save(); 
                    
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Alat Medis #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                
                ];    
            }else{
                 return [
                    'title'=> "Sarana Nonmedis :".$id,
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

    

    protected function findModel($id)
    {
        if (($model = AlatRs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
