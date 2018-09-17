<?php

namespace app\controllers;

use Yii;
use app\models\SuratLaporan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuratLaporanController implements the CRUD actions for SuratLaporan model.
 */
class SuratLaporanController extends Controller
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
     * Lists all SuratLaporan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SuratLaporan::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratLaporan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratLaporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratLaporan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratLaporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratLaporan model.
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
     * Finds the SuratLaporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratLaporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratLaporan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSurat() {
        $nomor = SuratLaporan::find()
            ->select('nomor')
            ->where(['no'=> 1])
            ->scalar();
            echo $nomor;

        $nama_peristiwa = KasusTgr::find()
            ->select('nama_peristiwa')
            ->where(['no'=>1])
            ->scalar();
            echo $nama_peristiwa;

        $nilai = KasusTgr::find()
            ->select('nilai')
            ->where(['no'=>1])
            ->scalar();
            echo $nilai;

        $kronologi = KasusTgr::find()
            ->select('ket_lain')
            ->where(['no'=>1])
            ->scalar();
            echo $kronologi;

        $nama = KasusTgr::find()
            ->select('nama_pihak')
            ->where(['no'=>1])
            ->scalar();
            echo $nama;

        $pangkatgol = KasusTgr::find()
            ->select('nama_pihak')
            ->where(['no'=>1])
            ->scalar();
            echo $nama;

        $nama = KasusTgr::find()
            ->select('nama_pihak')
            ->where(['no'=>1])
            ->scalar();
            echo $nama;

        $nama = KasusTgr::find()
            ->select('nama_pihak')
            ->where(['no'=>1])
            ->scalar();
            echo $nama;

        return $this->render('surat', [
            'nomor' => $nomor,
            'nama' => $nama,
        ]);
    }

    // public function actionSurat() {
    //     return $this->render('result');
    // }


}
