<?php

namespace app\controllers;

use Yii;
use app\models\Surat;
use app\models\Kasus;
use app\models\Satker;
use app\models\Debitur;
use app\models\SptgrForm;
use app\models\SpgrbmnForm;
use app\models\SpgridtbForm;
use app\models\SktjmtgrbmnForm;
use app\models\SktjmtgrnonbmnForm;
use app\models\SkpembebasanForm;
use app\models\SkpembebanantgrForm;
use app\models\SuratSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

/**
 * SuratController implements the CRUD actions for Surat model.
 */
class SuratController extends Controller
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
     * Lists all Surat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	/**
     * Lists all Surat models.
     * @return mixed
     */
    public function actionViewsurat($id)
    {
        $searchModel = new SuratSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = Surat::find()->where(['id_kasus'=>$id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('viewsurat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id
        ]);
        // return $this->render('view', [
            // 'model' => $this->findModel($id),
        // ]);
    }

    /**
     * Displays a single Surat model.
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
     * Creates a new Surat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idkasus, $idjenissurat)
    {
        $model = new Surat();

        if ($model->load(Yii::$app->request->post())) {
            //default isian surat
            $model->id_jenissurat = $idjenissurat;
            $model->id_kasus = $idkasus;
            $model->pembuat = Yii::$app->user->getIdentity()->username;

            $model->save(false);

            $idsurat = $model->id_surat;
  
            switch ($idjenissurat) {
                case 1:
                    return $this->redirect(['surat/form_sptgr', 'idsurat' => $idsurat]); 
                    break;
                case 2:
                    return $this->redirect(['surat/form_spgr_bmn', 'idsurat' => $idsurat]);
                    break;
                case 3:
                    return $this->redirect(['surat/form_spgr_idtb', 'idsurat' => $idsurat]);
                    break;
                case 4:
                    return $this->redirect(['surat/form_sktjm_tgr_bmn', 'idsurat' => $idsurat]);
                    break;
                case 5:
                    return $this->redirect(['surat/form_sktjm_tgr_non_bmn', 'idsurat' => $idsurat]);
                    break;
                //sktjm tp gaada
                case 7:
                    return $this->redirect(['surat/form_sk_pembebasan', 'idsurat' => $idsurat]);
                    break;
                case 8:
                    return $this->redirect(['surat/form_sk_pembebanan_tgr', 'idsurat' => $idsurat]);
                    break;
                //sk pembebanan tp kok sama aja sama sk pembebanan tgr? -_-
                
                // case 3:
                //     return $this->redirect([''])
            }
            // elseif (condition) {
            //     # code...
            // }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionForm_sptgr($idsurat)
    {
        $model = new SptgrForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();
        $nomor = $surat->nomor_surat;
        $tglupload = $surat->tgl_upload;
        $bps = $satker->nama_satker;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            // $phpWord = new \PhpOffice\PhpWord\PhpWord();
            // header("Pragma: no-cache"); // required
            // header("Expires: 0");
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header("Cache-Control: private", false); // required for certain browsers
            // header("Content-type: application/vnd.ms-word");
            // header("Content-Disposition: attachment; filename=surat.doc");
            // header("Content-Transfer-Encoding: binary");
            // ob_clean();
            // flush();
            // return $this->renderPartial('surat',
            //     ['model' => $model,        
            //     'surat' => $surat,
            // ]);

            // get your HTML raw content without any layouts or scripts
            $content = $this->renderPartial('surat-sptgr',[
                'model' => $model,
                'surat' => $surat,
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_sptgr', [
                'model' => $model,
                'nomor' => $nomor,
                'tglupload' => $tglupload,
                'bps' => $bps
            ]);
        }

        return $this->render('form_sptgr', [
            'model' => $model,
            'nomor' => $nomor,
            'tglupload' => $tglupload,
            'bps' => $bps
        ]);
    }

    public function actionForm_spgr_bmn($idsurat)
    {
        $model = new SpgrbmnForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();
        // $nomor = $surat->nomor_surat;
        // $tglupload = $surat->tgl_upload;
        // $bps = $satker->nama_satker;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            // get your HTML raw content without any layouts or scripts
            $content = $this->renderPartial('spgr-bmn',[
                'model' => $model,
                'surat' => $surat,
                'satker' => $satker
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_spgrbmn', [
                'model' => $model,
                'nomor' => $nomor,
                'tglupload' => $tglupload,
                'bps' => $bps
            ]);
        }

        return $this->render('form_spgrbmn', [
            'model' => $model,
            'nomor' => $nomor,
            'tglupload' => $tglupload,
            'bps' => $bps
        ]);
    }

    public function actionForm_spgr_idtb($idsurat)
    {
        $model = new SpgridtbForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            $content = $this->renderPartial('surat-spgr-idtb',[
                'model' => $model,
                'surat' => $surat,
                'satker' => $satker
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_spgridtb', [
                'model' => $model,
            ]);
        }

        return $this->render('form_spgridtb', [
            'model' => $model,
        ]);
    }

    public function actionForm_sktjm_tgr_bmn($idsurat)
    {
        $model = new SktjmtgrbmnForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            $pegawai = Debitur::find()
                                ->where(['id_debitur' => $kasus->id_debitur])
                                ->one();
            // $nama = $pegawai->nama;
            // $alamat = $pegawai->alamat;
            $content = $this->renderPartial('surat-sktjm-tgr-bmn',[
                'model' => $model,
                'surat' => $surat,
                'satker' => $satker,
                'pegawai' => $pegawai,
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_sktjmtgrbmn', [
                'model' => $model,
            ]);
        }

        return $this->render('form_sktjmtgrbmn', [
            'model' => $model,
        ]);
    }

    public function actionForm_sktjm_tgr_non_bmn($idsurat)
    {
        $model = new SktjmtgrnonbmnForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            $pegawai = Debitur::find()
                                ->where(['id_debitur' => $kasus->id_debitur])
                                ->one();
            // $nama = $pegawai->nama;
            // $alamat = $pegawai->alamat;
            $content = $this->renderPartial('surat-sktjm-idtb',[
                'model' => $model,
                'surat' => $surat,
                'satker' => $satker,
                'pegawai' => $pegawai,
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_sktjmtgrnonbmn', [
                'model' => $model,
            ]);
        }

        return $this->render('form_sktjmtgrnonbmn', [
            'model' => $model,
        ]);
    }

    public function actionForm_sk_pembebasan($idsurat)
    {
        $model = new SkpembebasanForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            $content = $this->renderPartial('sk-pembebasan',[
                'model' => $model,
                'kasus' => $kasus,
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_skpembebasan', [
                'model' => $model,
            ]);
        }

        return $this->render('form_skpembebasan', [
            'model' => $model,
        ]);
    }

    public function actionForm_sk_pembebanan_tgr($idsurat)
    {
        $model = new SkpembebanantgrForm();

        $surat = Surat::find()
                    ->where(['id_surat' => $idsurat])
                    ->one();
        $kasus = Kasus::find()
                    ->where(['id_kasus' => $surat->id_kasus])
                    ->one();
        $satker = Satker::find()
                        ->where(['kdsatker' => $kasus->kdsatker])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...
            $tgr = Surat::find()
                        ->where(['id_kasus' => $surat->id_kasus, 'id_jenissurat' => 1])
                        ->one();
            $content = $this->renderPartial('sk-pembebanan-tgr',[
                'model' => $model,
                'kasus' => $kasus,
                'satker' => $satker,
                'tgr' => $tgr,
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
                'options' => ['title' => 'Surat SPTGR'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Surat SPTGR'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            return $pdf->render();

            
            // return $this->render('surat-sptgr', ['model' => $model, 'surat' => $surat]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('form_skpembebanantgr', [
                'model' => $model,
            ]);
        }

        return $this->render('form_skpembebanantgr', [
            'model' => $model,
        ]);
    }

    // public function actionCreatepdfsptgr()
    // {
    //     $mpdf = new mPDF();
    //     $mpdf->WriteHTML($this->renderPartial(''))
    // }
	
	
    /**
     * Updates an existing Surat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_surat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Surat model.
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
     * Finds the Surat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Surat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Surat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
