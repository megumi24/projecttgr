<?php

namespace app\controllers;

use Yii;
use app\models\Debitur;
use app\models\DebiturSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DebiturController implements the CRUD actions for Debitur model.
 */
class DebiturController extends Controller
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
     * Lists all Debitur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DebiturSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Debitur model.
     * @param string $id
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
     * Creates a new Debitur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Debitur();

        if ($model->load(Yii::$app->request->post())) {

            /*if($this->jenis_debitur == 0){
            $model->id_debitur = $model->nip;
        }elseif ($this->jenis_debitur== 1) {
            $kdsatker = $this->getidentity->username;
            $thn = time('Y');
            $debitur = select * where $model->tahun_daftar = $thn and $model->jenis_debitur = 1 and $model->satker = $kdsatker;
            $debt = str_pad(count($debitur),3,0);
            $model->id_debitur = 'NPG'.$kdsatker.$thn.$debt;
        }*/
            return $this->redirect(['view', 'id' => $model->id_debitur]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Debitur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_debitur]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Debitur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Debitur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Debitur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Debitur::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetdebitur($id) 
    {
        if($id == 0){
          echo '<div class="form-group">
            <label class="control-label ">NIP :</label>
            <input type="text" name="nip"> 
            </div>';  
        }elseif($id == 1){
            echo '
            <div class="form-group">
            
            <label class="control-label">Nama :</label>
            <input type="text" name="nama"/><br/>

            <label class="control-label">Alamat :</label>
            <input type="text" name="alamat"/><br/>

            <label class="control-label">Email :</label>
            <input type="text" name="email"/><br/>
            </div>
            ';
        }    
    }
}
