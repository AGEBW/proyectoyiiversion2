<?php

namespace app\controllers;

use Yii;
use app\models\Detallepedido;
use app\models\DetallepedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallepedidoController implements the CRUD actions for Detallepedido model.
 */
class DetallepedidoController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Detallepedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetallepedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallepedido model.
     * @param integer $iddetallepedido
     * @param integer $idpedido
     * @param integer $idproducto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddetallepedido, $idpedido, $idproducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddetallepedido, $idpedido, $idproducto),
        ]);
    }

    /**
     * Creates a new Detallepedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detallepedido();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetallepedido' => $model->iddetallepedido, 'idpedido' => $model->idpedido, 'idproducto' => $model->idproducto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detallepedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddetallepedido
     * @param integer $idpedido
     * @param integer $idproducto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddetallepedido, $idpedido, $idproducto)
    {
        $model = $this->findModel($iddetallepedido, $idpedido, $idproducto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetallepedido' => $model->iddetallepedido, 'idpedido' => $model->idpedido, 'idproducto' => $model->idproducto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detallepedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddetallepedido
     * @param integer $idpedido
     * @param integer $idproducto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddetallepedido, $idpedido, $idproducto)
    {
        $this->findModel($iddetallepedido, $idpedido, $idproducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detallepedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddetallepedido
     * @param integer $idpedido
     * @param integer $idproducto
     * @return Detallepedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddetallepedido, $idpedido, $idproducto)
    {
        if (($model = Detallepedido::findOne(['iddetallepedido' => $iddetallepedido, 'idpedido' => $idpedido, 'idproducto' => $idproducto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
