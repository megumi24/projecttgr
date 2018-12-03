<?php

namespace app\controllers;

use Yii;
use app\models\RincianPembayaran;
use app\models\RincianPembayaranSearch;
use app\models\Kasus;
use app\models\KasusTp;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;

/**
 * RincianPembayaranController implements the CRUD actions for RincianPembayaran model.
 */
class RincianPembayaranController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RincianPembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RincianPembayaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all RincianPembayaran models.
     * @return mixed
     */
    public function actionRincian($id)
    {
        $searchModel = new RincianPembayaranSearch();
        $query = RincianPembayaran::find()->where(['id_kasus'=>$id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $kasus = Kasus::find()->where(['id_kasus'=>$id])->one();
        

        return $this->render('rincian', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'kasus' => $kasus,
        ]);
    }
	
	/**
     * Lists TGR RincianPembayaran models.
     * @return mixed
     */
    public function actionNota($id)
    {
        $kasus = Kasus::find()->where(['id_kasus'=>$id])->one();
        $model = RincianPembayaran::find()->where(['id_kasus'=>$id])->all();

        return $this->render('lamannota', [
            'kasus' => $kasus,
            'model' => $model,
        ]);
    }

    /**
     * Lists TGR RincianPembayaran models.
     * @return mixed
     */
    public function actionGenerate($id)
    {
        $kasus = Kasus::find()->where(['id_kasus'=>$id])->one();
        $model = RincianPembayaran::find()->where(['id_kasus'=>$id])->all();

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('nota',[
            'kasus' => $kasus,
            'model' => $model,
        ]);

       // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Nota Debitur'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Nota Debitur'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }

	/**
     * Lists TP RincianPembayaran models.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new RincianPembayaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$tgr = Kasus::find()->select('id_kasus')->all();
		
        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RincianPembayaran model.
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
     * Creates a new RincianPembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new RincianPembayaran();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_kasus = $id;
            $model->id = count(RincianPembayaran::find()->all());
            $model->save(false);
            return $this->redirect(['rincian', 'id' => $model->id_kasus]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RincianPembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RincianPembayaran model.
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
     * Finds the RincianPembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RincianPembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RincianPembayaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
