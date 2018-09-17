<?php

namespace app\controllers;

use Yii;
use app\models\PembayaranTp;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pegawai;
use yii\data\SqlDataProvider;

/**
 * PembayaranTpController implements the CRUD actions for PembayaranTp model.
 */
class PembayaranTpController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all PembayaranTp models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => PembayaranTp::find(),
        // ]);

        $dataProvider = new SqlDataProvider([
           'sql' => 'SELECT p.*, pe.nama FROM pembayaran_tp p, pegawai pe WHERE pe.nip = p.nip'
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PembayaranTp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($nomor_surat,$id)
    {
        // $id=$_GET['nomor_sktjm'];
        $dataProvider = new ActiveDataProvider([
            'query' => PembayaranTp::find()
            ->where(['nomor_surat'=>$nomor_surat])
        ]);

        // $dataProvider = new SqlDataProvider([
        //    'sql' => 'SELECT p.ntpn FROM pembayaran_tgr p WHERE p.nomor_sktjm = '.$id.''
        // ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
            // 'RincianPembayaran' => $RincianPembayarans,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PembayaranTp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PembayaranTp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PembayaranTp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat, 'nomor_surat'=>$model['nomor_surat']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PembayaranTp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PembayaranTp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PembayaranTp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PembayaranTp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
