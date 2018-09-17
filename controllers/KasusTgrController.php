<?php

namespace app\controllers;

use Yii;

use app\models\KasusTgr;
use app\models\FileUpload;
use app\models\KasusTgrSearch;
use app\models\MasterSurat;
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

    /**
     * Displays a single KasusTgr model.
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
     * Creates a new KasusTgr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KasusTgr();
        $modelsatker = new Satker();
        $modelSurat = new FileUpload();
        $rawSurat = MasterSurat::find()
            ->select('nama_surat');
            // ->all();
        $model->satker=Yii::$app->user->identity->username; 
        $model->wilayah=$modelsatker->getKodeWilayahById(Yii::$app->user->identity->username);
            
        if ($model->load(Yii::$app->request->post())) {
            $j = $model->jumlah_surat;
            $model->jumlah_dokumen = $model->jumlah_surat;
            for ($index=1;$index < $j;$index++){
                $param = 'files'.$index;
                $model->$param = UploadedFile::getInstance($model, 'files'.$index);
                $uploadPath = "uploads/";
                $filename=$model->$param.'.'.$model->$param->extension;
                // $model->$param = saveAs($uploadPath.$filename);
                $succesSave = $model->$param->saveAs($uploadPath.$filename);
                $param2 = 'file'.$index;
                $model->$param2 = $filename;

                }
            
            $model->save(false);

            // $modelSurat->nama_surat = $filename;
            // $modelSurat->save();
            // if ($modelSurat->save()) {
            // $model->id_kasus = $modelSurat->id_kasus;
            // }
            return $this->redirect(['view', 'id' => $model->id_kasus]);
            } else {
            return $this->render('create', [
                'model' => $model, 'rawSurat'=>$rawSurat, 
            // 'modelSurat' => $modelSurat,
            ]);
        }
    }

    public function actionGetsuratpdf($id){

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kasus]);
        } else {
            return $this->render('update', [
                'model' => $model,
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

    public function actionGetnip() {
    echo '<div id="nip" class="form-group field-kasustgr-nip">
    <label class="control-label" for="kasustgr-nip">NIP</label>
    <input type="text" id="kasustgr-nip" class="form-control" name="KasusTgr[nip]" maxlength="18">

    <div class="help-block"></div>
    </div>';
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
