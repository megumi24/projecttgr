<?php

namespace app\controllers;

use Yii;
use app\models\SuratTandaLunas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpWord;
/**
 * SuratTandaLunasController implements the CRUD actions for SuratTandaLunas model.
 */
class SuratTandaLunasController extends Controller
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
     * Lists all SuratTandaLunas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SuratTandaLunas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratTandaLunas model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratTandaLunas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratTandaLunas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratTandaLunas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratTandaLunas model.
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
     * Finds the SuratTandaLunas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SuratTandaLunas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratTandaLunas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSurat($id) {

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        
        $nomor = SuratTandaLunas::find()
            ->select('nomor_surat')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nomor;
        $nama = SuratTandaLunas::find()
            ->select('nama')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nama;
        $tanggal = SuratTandaLunas::find()
            ->select('date(tanggal)')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $tanggal;
        $jumlah = SuratTandaLunas::find()
            ->select('jumlah')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $jumlah;
        header("Pragma: no-cache"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=calk.doc");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
        return $this->renderPartial('surat', [
            'nomor' => $nomor,
            'nama' => $nama,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'model' => $this->findModel($id),
        ]);
    }
}
