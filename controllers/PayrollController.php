<?php

namespace app\controllers;

use Yii;
use app\models\Payroll;
use app\models\PayrollSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\Driver;
use app\models\Car;

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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create','update','view'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
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
        $drivers = ArrayHelper::map(Driver::find()->select(['iddriver','name','last_name'])->where(['status' => 1])->all(), 'iddriver', function($data) {
            return $data['name'] . ' ' . $data['last_name'];
        });
        $cars = ArrayHelper::map(Car::find()->where(['status' => 1])->all(), 'idcar', 'plaque');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id]);
            //Yii::$app->session->setFlash('success', "Planilla creada correctamente."); 
            //return $this->redirect(Yii::$app->homeUrl);
        }

        return $this->render('create', [
            'model' => $model,
            'drivers' => $drivers,
            'cars' => $cars
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

        $drivers = ArrayHelper::map(Driver::find()->select(['iddriver','name','last_name'])->where(['status' => 1])->all(), 'iddriver', function($data) {
            return $data['name'] . ' ' . $data['last_name'];
        });
        $cars = ArrayHelper::map(Car::find()->where(['status' => 1])->all(), 'idcar', 'plaque');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'drivers' => $drivers,
            'cars' => $cars
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

    /**
     * Function to download payroll of drivers between two dates
     * @param date date_from
     * @param date date_to
     */
    public function actionDownload()
    {
        $drivers = ArrayHelper::map(Driver::find()->select(['iddriver','name','last_name'])->where(['status' => 1])->all(), 'iddriver', function($data) {
            return $data['name'] . ' ' . $data['last_name'];
        });

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            if (!empty($data['date_from'])) {
                
                $date_from = $data['date_from'] . ' 00:00:00';
                $date_to = $data['date_to'];
                $id_driver = $data['id_driver'];
                
                if (!empty($date_to) && !empty($id_driver)) {
                   
                    $date_to = $date_to . ' 23:59:59';
                    
                    $payrolls = Payroll::find()
                    ->where(['between', 'created_at', $date_from, $date_to])
                    ->andWhere(['driver_id' => $id_driver])
                    ->all();
                
                } elseif(!empty($date_to)) {
                    
                    $date_to = $date_to . ' 23:59:59';
                    
                    $payrolls = Payroll::find()
                    ->where(['between', 'created_at', $date_from, $date_to])
                    ->all();
                } elseif (!empty($id_driver)) {
                    
                    $payrolls = Payroll::find()
                    ->where(['>=', 'created_at', $date_from])
                    ->andWhere(['driver_id' => $id_driver])
                    ->all();
                } else {
                    $payrolls = Payroll::find()
                    ->where(['>=', 'created_at', $date_from])
                    ->all();
                }

                if (!empty($payrolls)) {
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Disposition: attachment; filename=planillas-' . date('Y-m-d-His', time() - 18000) . '.csv');

                    $archivo_salida = fopen('php://output', 'w');

                    $campos = ['Id Planilla', 'Conductor', 'Placa', 'Km Inicial', 'Km Final', 'Desde' , 'Hasta', 'Hora', 'Tipo de pago', 'Valor', 'Fecha liquidación', 'Voucher', 'Gasto Parq', 'Gasto gas', 'Otros gastos', 'Descripcíon otros', 'Creado en', 'Actualizado en'];
                    fputcsv($archivo_salida, $campos, ';');
                    foreach ($payrolls as $payroll) {
                        if ($payroll->type_pay == 1) {
                            $type_pay = 'Efectivo';
                        } elseif ($payroll->type_pay == 2) {
                            $type_pay = 'Voucher';
                        } else {
                            $type_pay = 'Cuenta x Cobrar';
                        }
                        $resultado = [
                            'Id Planilla' => $payroll->idpayroll,
                            'Conductor' => $payroll->driver->name . ' ' . $payroll->driver->last_name, 
                            'Placa' => $payroll->car->plaque,
                            'Km Inicial' => $payroll->km_initial,
                            'Km Final' => $payroll->km_final,
                            'Desde'  => $payroll->from,
                            'Hasta' => $payroll->to,
                            'Hora' => $payroll->hour,
                            'Tipo de pago' => $type_pay,
                            'Valor' => $payroll->value,
                            'Fecha liquidación' => $payroll->settlement_date,
                            'Voucher' => $payroll->voucher,
                            'Gasto Parq' => $payroll->parking_value,
                            'Gasto gas' => $payroll->fuel_value,
                            'Otros gastos' => $payroll->others_value,
                            'Descripcíon otros' => $payroll->other_description,
                            'Creado en' => $payroll->created_at,
                            'Actualizado en' => $payroll->updated_at
                        ];
        
                        fputcsv($archivo_salida, $resultado, ';');
                    }
                    fclose($archivo_salida);
                    exit;
                } else {
                    Yii::$app->session->setFlash('error', "No se encontro información con los filtros aplicados.");    
                }
            } else {
                Yii::$app->session->setFlash('error', "Debe seleccionar una fecha inicial.");
            }
        }

        return $this->render('download', [
            'drivers' => $drivers
        ]);
    }
}
