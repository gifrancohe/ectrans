<?php

namespace app\controllers;

use Yii;
use app\models\Payroll;
use app\models\PayrollSearch;
use app\models\Driver;
use app\models\Car;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PayrollController implements the CRUD actions for Payroll model.
 */
class PayrollController extends Controller
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
     * Lists all Payroll models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PayrollSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payroll model.
     * @param integer $idpayroll
     * @param integer $driver_id
     * @param integer $car_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idpayroll, $driver_id, $car_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpayroll, $driver_id, $car_id),
        ]);
    }

    /**
     * Creates a new Payroll model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payroll();
        $drivers = ArrayHelper::map(Driver::find()->all(), 'iddriver', 'name');
        $cars = ArrayHelper::map(Car::find()->all(), 'idcar', 'plaque');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'drivers' => $drivers,
            'cars' => $cars,
        ]);
    }

    /**
     * Updates an existing Payroll model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpayroll
     * @param integer $driver_id
     * @param integer $car_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idpayroll, $driver_id, $car_id)
    {
        $model = $this->findModel($idpayroll, $driver_id, $car_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Payroll model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpayroll
     * @param integer $driver_id
     * @param integer $car_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idpayroll, $driver_id, $car_id)
    {
        $this->findModel($idpayroll, $driver_id, $car_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Payroll model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idpayroll
     * @param integer $driver_id
     * @param integer $car_id
     * @return Payroll the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpayroll, $driver_id, $car_id)
    {
        if (($model = Payroll::findOne(['idpayroll' => $idpayroll, 'driver_id' => $driver_id, 'car_id' => $car_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
