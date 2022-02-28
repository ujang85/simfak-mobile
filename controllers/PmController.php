<?php

namespace app\controllers;

use Yii;
use app\models\AlatRs;
use app\models\Pm;
use app\models\PmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Da\QrCode\QrCode;
use yii\web\Response;
use yii\helpers\Json;
/**
 * PmController implements the CRUD actions for Pm model.
 */
class PmController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pm]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pm]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionQrcode()
    {
           
            Yii::$app->response->format = yii\web\Response::FORMAT_RAW;
         //   Yii::$app->response->format = Response::FORMAT_RAW;
            $qrCode = (new QrCode('12'))
            ->setSize(60)
            ->setMargin(5);
         //   ->useForegroundColor(51, 153, 255);

        // now we can display the qrcode in many ways
        // saving the result to a file:

            $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified

            // display directly to the browser 
          //  header('Content-Type:image/png'.$qrCode->getContentType());
          //  echo $qrCode->writeString();
             header('Content-Type:image/png');
            echo $qrCode->writeString();
    }

    public function actionGetAlat($alatId)
    {   
        $KodeAlat=AlatRs::find()->where(['kode_alat'=>$alatId])->one();
        echo Json::encode($KodeAlat);
        exit;
    }
    /**
     * Deletes an existing Pm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
