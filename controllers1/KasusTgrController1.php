<?php

namespace app\controllers;

use Yii;

use yii\base\Model;
use app\models\KasusTgr;
use app\models\Dokumen;
use app\models\KasusTgrSearch;
use app\models\JenisDokumen;
use app\models\DokumenKerugian;
use app\models\Satker;
use app\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KasusTgrController implements the CRUD actions for KasusTgr model.
 */
class KasusTgrController extends Controller
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
     * Lists all KasusTgr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KasusTgrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $model->satker=Yii::$app->user->identity->username; 
        
        // if (Yii::$app->user->getIdentity()->level==2 || Yii::$app->user->getIdentity()->level==5) {
            
        // $kasus = $query->orderBy('nama_peristiwa');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionEmail()
    {
        Yii::$app->mailer->compose()
				->setFrom('develop24else@gmail.com')
				->setTo('elseh29@gmail.com')
				->setSubject('SIRINE - Transaksi TGR')
				->send();
    }

    /**
     * Displays a single KasusTgr model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
		$modelDokumen = Dokumen::find()->where(['id_kasus'=>$model->id_kasus])->all();
		
		return $this->render('view', [
            'model' => $model,
			'modelDokumen' => $modelDokumen,
        ]);
    }

    /**
     * Creates a new KasusTgr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /* public function actionCreate()
    {
        $model = new KasusTgr();
		$modelDokumen = new Dokumen();
        
		$dokker = DokumenKerugian::find()->where(['id_kasus'=>$model])
		if ($model->load(Yii::$app->request->post())){
			$model->status_kasus = 'belum diproses';
			$model->kdsatker=Yii::$app->user->identity->username; 
			$model->wilayah=$modelsatker->getKodeWilayahById(Yii::$app->user->identity->username);
			
			//find out how many products have been submitted by the form
			$count = count(Yii::$app->request->post('Dokumen', []));
		
			//send at least one model to the form
			$modelDokumen = [new Dokumen()];
		
			//create an array of the products submitted
			for($i = 1; $i < $count; $i++){
				$modelDokumen[] = new Dokumen();
			}
			
			if(Model::loadMultiple($modelDokumen, Yii::$app->request->post()) && Model::validateMultiple([$model, $modelDokumen])){
				foreach($modelDokumen as $Dokumen){
					$Dokumen->id_kasus = $model->id_kasus;
					$Dokumen->id_jenis = $item;
				
					$Dokumen->upload = UploadedFile::getInstance ($model,'upload');
				
					if($Dokumen->upload){
						$nama = $modelDokumen->id_kasus.'-'.$modelDokumen->jenisDokumen->nama_dokumen.'-'.date('Y-m-d');
						$path = 'uploads/' . $filename . '.' . $modelDokumen->upload->extension;
						if ($Dokumen->upload->saveAs($path)) {
							$Dokumen->nama_dokumen = $nama;
							$Dokumen->path_dokumen = $path;
						}
					}
					$Dokumen->save(false);
				}
				return $this->redirect(['view', 'id' => $model->id_kasus]);
			} else {
				return $this->render('create', [
					'model' => $model, 'modelDokumen'=>$modelDokumen, 
				]);
			}
			
		}
		
    } */
	
	/**
     * Creates a new KasusTgr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KasusTgr();
		
		$count = count(Yii::$app->request->post('Dokumen', []));
		$dokumen = [new Dokumen()];
		for ($i=1; $i<$count; $i++){
			$dokumen[] = new Dokumen();
		}
		
		$model->kdsatker=Yii::$app->user->identity->username; 
                   
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($dokumen, Yii::$app->request->post())) {
            
			foreach($dokumen as $dokumen){
				$dokumen->id_kasus = $model->id_kasus;
				
				$dokumen->upload = UploadedFile::getInstance ($dokumen,'upload');
				
				if($dokumen->upload){
					$nama = $modelDokumen->id_kasus.'-'.$modelDokumen->jenisDokumen->nama_dokumen.'-'.date('Y-m-d');
					$path = 'uploads/' . $filename . '.' . $modelDokumen->upload->extension;
					if ($dokumen->upload->saveAs($path)) {
						$dokumen->nama_dokumen = $nama;
						$dokumen->path_dokumen = $path;
					}
				}
			}
			
			$isValid = $model->validate();
			$isValid = Model::validateMultiple([$dokumen]) && $isValid;
			
			if ($isValid){
				$model->save(false);
				$dokumen->save(false);
				return $this->redirect(['view', 'id' => $model->id_kasus]);
			}else{
				return $this->render('create', [
                'model' => $model, 'dokumen'=>$dokumen, 
				]);
			}
			
		}	
    }

	
	
    public function actionStatus($id){
		$model = $this->findModel($id);
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kasus]);
        } else {
            return $this->renderAjax('status', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing KasusTgr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$modelDokumen = Dokumen::find()->where(['id_kasus'=>$id])->all();

        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($modelDokumen, Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id_kasus]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'modelDokumen' => $modelDokumen,
            ]);
        }
    }

    /**
     * Deletes an existing KasusTgr model.
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
     * Finds the KasusTgr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return KasusTgr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KasusTgr::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetsurat($id) {
        
        // $id = $_GET('id');
        
        if ($id == 'BMN Roda 2' | $id == 'BMN Roda 4') {

            if (Yii::$app->user->getIdentity()->level==5) {
            $rawSurat = MasterSurat::find()
                ->select('nama_surat')
                ->where(['level_kasus' => [1,3,4]])
                ->all();
            }else{
            $rawSurat = MasterSurat::find()
                ->select('nama_surat')
                ->where(['level_kasus' => [1,2,4]])
                ->all();                
            }

            $index=1;
            foreach($rawSurat as $raw){
                echo '<div class="form-group field-kasustgr-files'.$index.'">
                    <label class="control-label" for="kasustgr-files'.$index.'">'.$raw->nama_surat.'</label>
                    <input name="KasusTgr[files'.$index.']" value="" type="hidden"><input id="kasustgr-files'.$index.'" name="KasusTgr[files'.$index.']" type="file"  accept="application/pdf">
                    <div class="help-block"></div>';
                $index++;
            }
                echo 
                    '<input value = "'.count($rawSurat).'"id="kasustgr-jumlah_surat" class="form-control" name="KasusTgr[jumlah_surat]" type="hidden">';
         
        }        

        if ($id == 'BMN Inventaris' | $id == 'BMN Lainnya') {
            if (Yii::$app->user->getIdentity()->level==5) {
            $rawSurat = MasterSurat::find()
                ->select('nama_surat')
                ->where(['level_kasus' => [1,3]])
                ->all();
            } else {
            $rawSurat = MasterSurat::find()
                ->select('nama_surat')
                ->where(['level_kasus' => [1,2]])
                ->all();                
            }
            $index=1;
            foreach($rawSurat as $raw){
                echo '<div class="form-group field-kasustgr-files'.$index.'">
                    <label class="control-label" for="kasustgr-files'.$index.'">'.$raw->nama_surat.'</label>
                    <input name="KasusTgr[files'.$index.']" value="" type="hidden"><input id="kasustgr-files'.$index.'" name="KasusTgr[files'.$index.']" type="file" accept="application/pdf">>
                    <div class="help-block"></div>';
                $index++;
            }
                echo 
                    '<input value = "'.count($rawSurat).'"id="kasustgr-jumlah_surat" class="form-control" name="KasusTgr[jumlah_surat]" type="hidden">';
        }

        if ($id == 'Non BMN Pengunduran Diri') {
            if (Yii::$app->user->getIdentity()->level==5) {
            $rawSurat = MasterSurat::find()
                ->select('nama_surat')
                ->where(['level_kasus' => [5,7,8]])
                ->all();
            }else{
            $rawSurat = MasterSurat::find()
                ->select('nama_surat')
                ->where(['level_kasus' => [5,6,8]])
                ->all();                
            }
            $index=1;
            foreach($rawSurat as $raw){
                echo '<div class="form-group field-kasustgr-files'.$index.'">
                    <label class="control-label" for="kasustgr-files'.$index.'">'.$raw->nama_surat.'</label>
                    <input name="KasusTgr[files'.$index.']" value="" type="hidden"><input id="kasustgr-files'.$index.'" name="KasusTgr[files'.$index.']" type="file" accept="application/pdf">>
                    <div class="help-block"></div>';
                $index++;
            }
                echo 
                    '<input value = "'.count($rawSurat).'"id="kasustgr-jumlah_surat" class="form-control" name="KasusTgr[jumlah_surat]" type="hidden">';
        }

        if ($id == 'Non BMN ID/TB') {
        $rawSurat = MasterSurat::find()
            ->select('nama_surat')
            ->where(['level_kasus' => [5,9]])
            ->all();
            $index=1;
            foreach($rawSurat as $raw){
                echo '<div class="form-group field-kasustgr-files'.$index.'">
                    <label class="control-label" for="kasustgr-files'.$index.'">'.$raw->nama_surat.'</label>
                    <input name="KasusTgr[files'.$index.']" value="" type="hidden"><input id="kasustgr-files'.$index.'" name="KasusTgr[files'.$index.']" type="file">
                    <div class="help-block"></div>';
                $index++;
            }
                echo 
                    '<input value = "'.count($rawSurat).'"id="kasustgr-jumlah_surat" class="form-control" name="KasusTgr[jumlah_surat]" type="hidden">';
        }
        

//         if ($id == 'Non BMN LHP') {
//         $rawSurat = MasterSurat::find()
//             ->select('nama_surat')
// -           ->where(['level_kasus' => 5])
//             ->all();
//             $index=1;
//             foreach($rawSurat as $raw){
//                 echo '<div class="form-group field-kasustgr-files'.$index.'">
//                     <label class="control-label" for="kasustgr-files'.$index.'">'.$raw->nama_surat.'</label>
//                     <input name="KasusTgr[files'.$index.']" value="" type="hidden"><input id="kasustgr-files'.$index.'" name="KasusTgr[files'.$index.']" type="file">
//                     <div class="help-block"></div>';
//                 $index++;
//             }
//                 echo 
//                     '<input value = "'.count($rawSurat).'"id="kasustgr-jumlah_surat" class="form-control" name="KasusTgr[jumlah_surat]" type="hidden">';

//         }        
        
    }

}
