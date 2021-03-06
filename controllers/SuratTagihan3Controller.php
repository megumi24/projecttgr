<?php

namespace app\controllers;

use Yii;
use app\models\SuratTagihan3;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pegawai;
use PhpWord;

/**
 * SuratTagihan3Controller implements the CRUD actions for SuratTagihan3 model.
 */
class SuratTagihan3Controller extends Controller
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
     * Lists all SuratTagihan3 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SuratTagihan3::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratTagihan3 model.
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
     * Creates a new SuratTagihan3 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratTagihan3();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratTagihan3 model.
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
     * Deletes an existing SuratTagihan3 model.
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
     * Finds the SuratTagihan3 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SuratTagihan3 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratTagihan3::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSurat($id)
    {
       $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $nomor = SuratTagihan3::find()
            ->select('nomor_surat')
            ->where(['nomor_surat'=> ($id)])
            ->scalar();
            echo $nomor;
        $nip = SuratTagihan3::find()
            ->select('nip')
            ->where(['nomor_surat'=> ($id)])
            ->scalar();
            echo $nip;
        $nama = Pegawai::find()
            ->select('nama')
            ->leftJoin('surat_tagihan_3', '`pegawai`.`nip` = `surat_tagihan_3`.`nip`')
            ->where(['`surat_tagihan_3`.`nomor_surat`'=> ($id)])
            ->scalar();
            echo $nama;
        $tanggal = SuratTagihan3::find()
            ->select('date(tanggal)')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $tanggal;
        // return $this->render('coba', [
        //     'nomor' => $nomor,
        //     'nip' => $nip,
        header("Pragma: no-cache"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=calk.doc");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
       echo $this->renderPartial('surat',['nomor' => $nomor, 'nip'=>$nip, 'nama'=>$nama, 'tanggal'=>$tanggal]);
    }
}
