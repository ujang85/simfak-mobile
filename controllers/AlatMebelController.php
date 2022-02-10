<?php

namespace app\controllers;

use Yii;
use app\models\AlatRs;
use app\models\AlatMebelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * AlatMedisController implements the CRUD actions for AlatMedis model.
 */
class AlatMebelController extends Controller
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
        $searchModel = new AlatMebelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionLap_aset_Mebel()
    {    
        $searchModel = new AlatMebelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lap_aset_Mebel', [
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
                    'title'=> "Alat Mebel #".$id,
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
     * Creates a new AlatMedis model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed

        else if($model->load($request->post())){

                    $tgl=new DateTime($model->tgl_pm);

                    $tgl->add(new DateInterval('P5M')); //+5Month

                //  $model->tgl_pm_berikut=$tgl; //atau $tgl->format('Y-m-d')

                     $model->no_pm = $model->no_pm;
                     $model->ket_pm = $model->ket_pm;
                     $model->id_alat = $model->id_alat;
                     $model->tgl_pm = $model->tgl_pm;
                     $model->tgl_pm_berikut=$tgl->format('Y-m-d');
                    // $model->teknisi1 = implode(',',$model->teknisi1);
                     $model->teknisi1 = implode(', ', (array)$model->teknisi1);
                     $model->kondisi_alat = $model->kondisi_alat;
                     $model->save();

     */

    public function actionCreate()
    {
        $request = Yii::$app->request;
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
                     $model->id_pemakai = $model->id_pemakai;
                     $model->nama_alat=$model->nama_alat;
                     $model->lokasi_brg = $model->lokasi_brg;
                     $model->merk_type = $model->merk_type;

                     $model->no_seri = $model->no_seri;
                     $model->pj_teknisi = $model->pj_teknisi;
                     $model->th_pengadaan = $model->th_pengadaan;
                     $model->hrg_peroleh = $model->hrg_peroleh;
                     $model->tgl_kalibrasi=$model->tgl_kalibrasi;
                     $model->periode_pm =  $model->periode_pm;
                     $model->status_milik = $model->status_milik;

                     $model->id_suplayer = $model->id_suplayer;
                     $model->resiko = $model->resiko;
                     $model->th_pasang = $model->th_pasang;
                     $model->pm1 = $model->pm1;
                     $model->kondisi=$model->kondisi;
                     $model->sb_dana = $model->sb_dana;
                     $model->tgl_peroleh = $model->tgl_peroleh;

                     $model->habis_garansi = $model->habis_garansi;
                     $model->habis_kso = $model->habis_kso;
                     $model->ket_fungsi = $model->ket_fungsi;
                     $model->prod_negara = $model->prod_negara;
                     $model->asal_peroleh=$model->asal_peroleh;
                     $model->teknologi =$model->teknologi;
                     $model->periode_kl = $model->periode_kl;
                     $model->kalibrasi = $model->kalibrasi;
                     $model->satuan_periodepm = $model->satuan_periodepm;
                     $model->konversi_pm = $model->periode_pm * $model->satuan_periodepm;
                     $model->life_time = $model->life_time;
                     $model->cost_tahun=$model->cost_tahun;
                     $model->satuan_periodekl = $model->satuan_periodekl;
                //     $model->konversi_kl = $model->periode_kl * $model->satuan_periodekl;
                     $model->pm_akhir = $model->pm_akhir;
                     $model->ket_pm_akhir = $model->ket_pm_akhir;
                     $model->kalibrasi_akhir = $model->kalibrasi_akhir;
                     $model->id_org = $model->id_org;
                     $model->kode_group = '5';
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
            } else if($model->load($request->post()) && $model->validate()){

                $model->inven_rs = $model->inven_rs;
                     $model->inven_bmn = $model->inven_bmn;
                     $model->inven_pemda = $model->inven_pemda;
                     $model->id_pemakai = $model->id_pemakai;
                     $model->nama_alat=$model->nama_alat;
                     $model->lokasi_brg = $model->lokasi_brg;
                     $model->merk_type = $model->merk_type;

                     $model->no_seri = $model->no_seri;
                     $model->pj_teknisi = $model->pj_teknisi;
                     $model->th_pengadaan = $model->th_pengadaan;
                     $model->hrg_peroleh = $model->hrg_peroleh;
                     $model->tgl_kalibrasi=$model->tgl_kalibrasi;
                     $model->periode_pm =  $model->periode_pm;
                     $model->status_milik = $model->status_milik;

                     $model->id_suplayer = $model->id_suplayer;
                     $model->resiko = $model->resiko;
                     $model->th_pasang = $model->th_pasang;
                     $model->pm1 = $model->pm1;
                     $model->kondisi=$model->kondisi;
                     $model->sb_dana = $model->sb_dana;
                     $model->tgl_peroleh = $model->tgl_peroleh;

                     $model->habis_garansi = $model->habis_garansi;
                     $model->habis_kso = $model->habis_kso;
                     $model->ket_fungsi = $model->ket_fungsi;
                     $model->prod_negara = $model->prod_negara;
                     $model->asal_peroleh=$model->asal_peroleh;
                     $model->teknologi =$model->teknologi;
                     $model->periode_kl = $model->periode_kl;
                     $model->kalibrasi = $model->kalibrasi;
                     $model->satuan_periodepm = $model->satuan_periodepm;
                     $model->konversi_pm = $model->periode_pm * $model->satuan_periodepm;
                     $model->life_time = $model->life_time;
                     $model->cost_tahun=$model->cost_tahun;
                     $model->satuan_periodekl = $model->satuan_periodekl;
                  //   $model->konversi_kl = $model->periode_kl * $model->satuan_periodekl;
                     $model->pm_akhir = $model->pm_akhir;
                     $model->ket_pm_akhir = $model->ket_pm_akhir;
                     $model->kalibrasi_akhir = $model->kalibrasi_akhir;
                     $model->id_org = $model->id_org;
                     $model->kode_group = '5';
                     $model->save();




                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Tambah Data #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Data #".$id,
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
       
        $Alat=AlatRs::find()->where(['inven_rs'=>$invenId])->one();
        echo Json::encode($Alat);
        exit;
        
    }


    public function actionGetAlat2($kode)
    {   
       
        $KodeAlat=AlatRs::find()->where(['kode_alat'=>$kode])->one();
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
