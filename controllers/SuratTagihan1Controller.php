<?php

namespace app\controllers;

use Yii;
use app\models\SuratTagihan1;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use PhpWord;
/**
 * SuratTagihan1Controller implements the CRUD actions for SuratTagihan1 model.
 */
class SuratTagihan1Controller extends Controller
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
     * Lists all SuratTagihan1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SuratTagihan1::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratTagihan1 model.
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
     * Creates a new SuratTagihan1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratTagihan1();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratTagihan1 model.
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
     * Deletes an existing SuratTagihan1 model.
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
     * Finds the SuratTagihan1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SuratTagihan1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratTagihan1::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSurat($id) {
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $nomor = SuratTagihan1::find()
            ->select('nomor_surat')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nomor;
        $nama = SuratTagihan1::find()
            ->select('nama_debitur')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nama;
        $tanggal = SuratTagihan1::find()
            ->select('date(tanggal)')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $tanggal;
    //     $content = $this->renderPartial('surat', [
    //         'nomor' => $nomor,
    //         'nama' => $nama,
    //         'tanggal' => $tanggal,
    //         'model' => $this->findModel($id),
    //     ]);
    //     $pdf = new Pdf([
    //     // set to use core fonts only
    //     'mode' => Pdf::MODE_UTF8, 
    //     // A4 paper format
    //     'format' => Pdf::FORMAT_A4, 
    //     // portrait orientation
    //     'orientation' => Pdf::ORIENT_PORTRAIT, 
    //     // stream to browser inline
    //     'destination' => Pdf::DEST_BROWSER, 
    //     // your html content input
    //     'content' => $content,  
    //     // format content from your own css file if needed or use the
    //     // enhanced bootstrap css built by Krajee for mPDF formatting 
    //     // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
    //     'cssFile' => '@web/css/site.css',
    //     // any css to be embedded if required
    //     'cssInline' => '.kv-heading-1{font-size:18px}', 
    //      // set mPDF properties on the fly
    //     // 'options' => ['title' => 'Krajee Report Title'],
    //      // call mPDF methods on the fly
    //     // 'methods' => [ 
    //     //     'SetHeader'=>['Krajee Report Header'], 
    //     //     'SetFooter'=>['{PAGENO}'],
    //     // ]
    // ]);
    //     return $pdf->render();
        header("Pragma: no-cache"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=calk.doc");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
       echo $this->renderPartial('surat',['nomor' => $nomor, 'nama'=>$nama, 'tanggal'=>$tanggal]);
    }

}
