<?php

namespace app\controllers;

use Yii;
use app\models\InSktjmBmnTpkn;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpWord;

/**
 * InSktjmBmnTpknController implements the CRUD actions for InSktjmBmnTpkn model.
 */
class InSktjmBmnTpknController extends Controller
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
     * Lists all InSktjmBmnTpkn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => InSktjmBmnTpkn::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InSktjmBmnTpkn model.
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
     * Creates a new InSktjmBmnTpkn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InSktjmBmnTpkn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nomor_surat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InSktjmBmnTpkn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing InSktjmBmnTpkn model.
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
     * Finds the InSktjmBmnTpkn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InSktjmBmnTpkn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InSktjmBmnTpkn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

public function actionSurat($id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $nomor_surat = InSktjmBmnTpkn::find()
            ->select('nomor_surat')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nomor_surat;
        $nip= InSktjmBmnTpkn::find()
            ->select('nip')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nip;
        $nominal = InSktjmBmnTpkn::find()
            ->select('nominal')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $nominal;
        $tgl_awal = InSktjmBmnTpkn::find()
            ->select('date(tgl_awal)')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $tgl_awal;
        $tgl_akhir = InSktjmBmnTpkn::find()
            ->select('date(tgl_akhir)')
            ->where(['nomor_surat' => ($id)])
            ->scalar();
            echo $tgl_akhir;

        header("Pragma: no-cache"); // required
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=sktjm.doc");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
        echo $this->renderPartial('sktjm_bmn',['nomor_surat' => $nomor_surat, 'nip'=>$nip,'nominal'=>$nominal ,'tgl_awal'=>$tgl_awal, 'tgl_akhir'=>$tgl_akhir]);
    }
        
    }

    