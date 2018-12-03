<?php

namespace app\controllers;

use Yii;

use app\models\Kasus;
use app\models\DokumenKerugian;
use app\models\Dokumen;
use app\models\KasusSearch;
use app\models\MasterSurat;
use app\models\SuratSearch;
use app\models\Satker;
use app\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Model;
use yii\db\Command;
use  yii\db\Query;
use yii\data\ActiveDataProvider;

/**
 * KasusController implements the CRUD actions for Kasus model.
 */
class KasusController extends Controller
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
     * Lists all Kasus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KasusSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $model->satker=Yii::$app->user->identity->username; 
        
        // if (Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==5) {
            
        // $kasus = $query->orderBy('nama_peristiwa');

        if(Yii::$app->user->identity->username == 'TPKN'){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }else{
            $query = Kasus::find()->where(['kdsatker'=>Yii::$app->user->identity->username]);
            $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	/**
     * Return Search Form.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new KasusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $model->satker=Yii::$app->user->identity->username; 
        
        // if (Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==5) {
            
        // $kasus = $query->orderBy('nama_peristiwa');

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kasus model.
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
     * Displays Pembayaran.
     * @param string $id
     * @return mixed
     */
	
	/**
     * Displays a single Kasus model.
     * @param string $id
     * @return mixed
     */
    public function actionPilihkasus()
    {
        $searchModel = new KasusSearch();
		/* $queryData = Yii::$app->request->queryParams;
		$conditionData = [\yii\helpers\StringHelper::basename(($searchModel => ['IN', 'status_kasus'], ['diproses']))];
		$searchData = array_merge_recursive($queryData, $conditionData); */
		$searchModel->status_kasus = '2';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('kasus-siapbayar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Kasus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $kasus =new Kasus();
       

        if($kasus->load(Yii::$app->request->post())){
            $kasus->nomor_sktjm = '';
            $kasus->tgl_dibuat = date('Y-m-d H:i:s');
            $kasus->kdsatker = Yii::$app->user->getIdentity()->username;
            $kasus->status_kasus = 0;
            $kasus->tata_cara = '';

            //return $this->redirect(['dokumen', 'id' => $kasus->id_kasus]);
           


            $kasus->save(false);

            return $this->redirect(['view', 'id' => $kasus->id_kasus]);
        }

        return $this->render('create', [
            'model' => $kasus,
        ]);

        /*//make new kasus
        $kasus = new Kasus();
		
		///Find out how many document have been submitted by the form
       	$count = count(Yii::$app->request->post('Dokumen', []));

       	//sent at least one model to the form
        $doks = [new Dokumen()];

        //make array for submit
        for($i = 1; $i<$count; $i++){
            $doks[] = new Dokumen();
        }
		
        if ($kasus->load(Yii::$app->request->post())) 
		{
            //default value for kasus
			$kasus->nomor_sktjm = '';
			$kasus->tgl_dibuat = date('Y-m-d H:i:s');
			$kasus->kdsatker = Yii::$app->user->getIdentity()->username;
			$kasus->status_kasus = 'belum diproses';
		
            if(Model::loadMultiple($doks, Yii::$app->request->post())){
            	$kasus->save(false);

	            foreach($doks as $dok){
	                //default value for dokumen
	                $dok->id_kasus = $kasus->id_kasus;
	                    
	                //variable from upload
	                $dok->upload = UploadedFile::getInstance($dok, 'upload');
	                if($dok->upload()){
	                    $filename = $dok->id_kasus.'-'.$dok->kasus->nip.'-'.$dok->id_jenis;
	                    $filepath = 'upload/'.$filename;
	                    if($dok->upload->saveAs($filepath)){
	                        $dok->nama_dokumen = $filename;
	                        $dok->path_dokumen = $filepath;
	                    }
	                }
	                $dok->save(false);
				}
            $model->contact(Yii::$app->params['adminEmail']);
            return $this->redirect(['view', 'id' => $idkasus]);
			}
		}
		return $this->render('create', [
            'model' => $kasus,
            'modelDok' => $doks,
		]);*/
	}

    public function actionGetdokumen($id) 
    {
        $jenisDokumen = DokumenKerugian::find()
            ->where(['id_kerugian' => $id])
			->all();
		echo '<br/><h2>Upload Dokumen </h2><br/>';
		$index = 1;
		foreach($jenisDokumen as $jenis){
			echo '<div class="form-group field-kasustgr-files'.$index.'">
                  <label class="control-label" for="kasustgr-files'.$index.'">'.$jenis->dokumen->jenis_dokumen.'</label>
                  <input name="KasusTgr[files'.$index.']" value="" type="hidden"><input id="kasustgr-files'.$index.'" name="KasusTgr[files'.$index.']" type="file"  accept="application/pdf">
                  <div class="help-block"></div>';
            $index++;
		}
	
    }

    public function actionGetpegawai($id) 
    {
        if($id == 0){
          echo '<div class="form-group">
            <label class="control-label ">NIP :</label>
            <input type="text" name="nip"> 
            </div>';  
        }elseif($id == 1){
            echo '
            <div class="form-group">
            <label class="control-label">Debitur :</label>
            <div class="">
                <div class="radio">
                <label class="radio">
                <input name="jenis" type="radio" value="lama"/>Debitur Lama
                </label>
                </div>

                <div class="radio">
                <label class="radio">
                <input name="jenis" type="radio" value="baru"/>Debitur Baru
                </label>
                </div>
            </div>

            <div class="form-group hidden">
                <label class="control-label" for="debitur_lama">ID Debitur :</label>
                <input type="text" name="nip"> 
            </div>

            <div class="form-group hidden id="div_daftar">
                <label class="control-label" for="daftar">Nama :</label>
                <input type="text" name="nama"/><br/>

                <label class="control-label" for="daftar">Alamat :</label>
                <input type="text" name="alamat"/><br/>

                <label class="control-label" for="daftar">Email :</label>
                <input type="text" name="email"/><br/>
            </div>
            ';
        }    
    }
	
    /**
     * Updates an existing Kasus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kasus]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	/**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function actionEmail($email)
    {
        Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom($this->email)
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();

        return true;
    }

    public function actionStatus($id){
		$model = $this->findModel($id);
		
		if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id_kasus]);
        } else {
            return $this->render('status', [
                'model' => $model,
            ]);
        }
    }
	
    public function actionGetnip() {
    echo '<div id="nip" class="form-group field-Kasus-nip">
    <label class="control-label" for="Kasus-nip">NIP</label>
    <input type="text" id="Kasus-nip" class="form-control" name="Kasus[nip]" maxlength="18">

    <div class="help-block"></div>
    </div>';
    }

	/**
     * Deletes an existing Kasus model.
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
     * Finds the Kasus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Kasus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kasus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	}