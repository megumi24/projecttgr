<?php

namespace app\controllers;

use Yii;
use app\models\PembayaranTgr;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RincianPembayaran;
use app\models\Pegawai;
use yii\data\SqlDataProvider;

/**
 * PembayaranTgrController implements the CRUD actions for PembayaranTgr model.
 */
class PembayaranTgrController extends Controller
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
     * Lists all PembayaranTgr models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => PembayaranTgr::find()
        //             ->select(['pembayaran_tgr.nip, pegawai.nama'])
        //             ->rightJoin('Pegawai', '`pegawai`.`nip` = `pembayaran_tgr`.`nip`')
        //                     ]);
        $dataProvider = new SqlDataProvider([
           'sql' => 'SELECT p.*, pe.nama FROM pembayaran_tgr p, pegawai pe WHERE pe.nip = p.nip'
        ]);
        // $nama = Pegawai::find()
        //     ->select('nama')
        //     ->leftJoin('pembayaran_tgr')
        //     ->where('`pegawai`.`nip` = `pembayaran_tgr`.`nip`')
        //     ->scalar();
        //     echo $nama;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PembayaranTgr model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($nomor_sktjm,$id)
    {
        
        // $id=$_GET['nomor_sktjm'];
        $dataProvider = new ActiveDataProvider([
            'query' => PembayaranTgr::find()
            ->where(['nomor_sktjm'=>$nomor_sktjm])
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
     * Creates a new PembayaranTgr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PembayaranTgr();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PembayaranTgr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'nomor_sktjm'=>$model['nomor_sktjm']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PembayaranTgr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PembayaranTgr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PembayaranTgr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PembayaranTgr::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
