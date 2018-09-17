<?php

namespace app\controllers;

use Yii;
use app\models\SuratBapTpkn;
use app\models\KasusTgr;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuratBapTpknController implements the CRUD actions for SuratBapTpkn model.
 */
class SuratBapTpknController extends Controller
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
     * Lists all SuratBapTpkn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SuratBapTpkn::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratBapTpkn model.
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
     * Creates a new SuratBapTpkn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratBapTpkn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratBapTpkn model.
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
     * Deletes an existing SuratBapTpkn model.
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
     * Finds the SuratBapTpkn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratBapTpkn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratBapTpkn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // public function actionSurat()
    // {
    //     return $this->render('surat'); 
    // }

    public function actionSurat($id) {
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $nomor = SuratBapTpkn::find()
            ->select('nomor')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $nomor;
        // $satker = KasusTgr::find()
        //     ->select('nomor_surat')
        //     ->where(['nomor_surat' => ($id)])
        //     ->scalar();
        //     echo $nomor;
        $namakasus = KasusTgr::find()
            ->select('nama_kasus')
            ->where(['id' => ($id)])
            ->scalar();
            echo $nama;
        $tanggal = SuratBapTpkn::find()
            ->select('date(tgl)')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $tanggal;
        $jenis = SuratBapTpkn::find()
            ->select('jenis')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $jenis;
        $merk = SuratBapTpkn::find()
            ->select('merk_type')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $merk;
        $nopol = SuratBapTpkn::find()
            ->select('no_pol')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $nopol;
        $warna = SuratBapTpkn::find()
            ->select('warna')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $warna;
        $supol = SuratBapTpkn::find()
            ->select('no_surat_pol')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $supol;
        $bapol = SuratBapTpkn::find()
            ->select('bap_polisi')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $bapol;
        $bapbps = SuratBapTpkn::find()
            ->select('no_bap_bps')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $bapbps;
        $kelalaian = SuratBapTpkn::find()
            ->select('kelalaian')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $kelalaian;
        $keputusan = SuratBapTpkn::find()
            ->select('keputusan')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $keputusan;
        $nilai = SuratBapTpkn::find()
            ->select('nilai_runeg')
            ->where(['nomor' => ($id)])
            ->scalar();
            echo $nilai;
        header("Pragma: no-cache"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=surat.doc");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
       return $this->renderPartial('surat',
        [
        'namakasus' => $namakasus,
        'nomor' => $nomor,
        'tanggal'=>$tanggal,
        'jenis'=>$jenis,
        'merk'=>$merk,
        'nopol'=>$nopol,
        'warna'=>$warna,
        'supol'=>$supol,
        'bapol'=>$bapol,
        'bapbps'=>$bapbps,
        'kelalaian'=>$kelalaian,
        'keputusan'=>$keputusan,
        'nilai'=>$nilai,
        
        'model' => $this->findModel($id),

    ]);
    }
}
