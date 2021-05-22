<?php

namespace app\controllers;

use Yii;
use app\models\Reservation;
use app\models\ReservationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\Customer;

/**
 * ReservationController implements the CRUD actions for Reservation model.
 */
class ReservationController extends Controller
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
                'only' => ['index','update','view'],
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
     * Lists all Reservation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservation model.
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
     * Creates a new Reservation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservation();

        $customers = ArrayHelper::map(Customer::find()->where(['status' => 1])->all(), 'idcustomer', 'trade_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Reservación creada correctamente."); 
            return $this->redirect(Yii::$app->homeUrl);
        }

        return $this->render('create', [
            'model' => $model,
            'customers' => $customers
        ]);
    }

    /**
     * Updates an existing Reservation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $customers = ArrayHelper::map(Customer::find()->where(['status' => 1])->all(), 'idcustomer', 'trade_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idreservation]);
        }

        return $this->render('update', [
            'model' => $model,
            'customers' => $customers
        ]);
    }

    /**
     * Deletes an existing Reservation model.
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
     * Finds the Reservation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reservation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reservation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Function to download reservation of customers between two dates
     * @param date date_from
     * @param date date_to
     */
    public function actionDownload()
    {
        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            if (!empty($data['date_from'])) {
                
                $date_from = $data['date_from'] . ' 00:00:00';
                $date_to = $data['date_to'];
                
                if (!empty($date_to)) {
                   
                    $date_to = $date_to . ' 23:59:59';
                    
                    $reservations = Reservation::find()
                    ->where(['between', 'created_at', $date_from, $date_to])
                    ->all();
                
                } else {
                    $reservations = Reservation::find()
                    ->where(['>=', 'created_at', $date_from])
                    ->all();
                }

                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename=reservaciones-' . date('Y-m-d-His', time() - 18000) . '.csv');

                $archivo_salida = fopen('php://output', 'w');

                if (!empty($reservations)) {
                    $campos = ['Id Reservación', 'Cliente', 'Desde', 'Hasta', 'Fecha reserva', 'Hora reserva' , 'Tipo de pago', 'Voucher', 'Estado reserva', 'Responsable reserva', 'Nro de pasajeros', 'Nombre pasajero', 'Contacto pasajero', 'Observaciones', 'Detalle vuelo', 'Creado en', 'Actualizado en'];
                    fputcsv($archivo_salida, $campos, ';');
                    foreach ($reservations as $reservation) {
                        if ($reservation->type_pay == 1) {
                            $type_pay = 'Efectivo';
                        } elseif ($reservation->type_pay == 2) {
                            $type_pay = 'Voucher';
                        } else {
                            $type_pay = 'Cuenta x Cobrar';
                        }
                        $status = $reservation->reservation_status == 1 ? 'Activa' : 'Inactiva';
                        $resultado = [
                            'Id Planilla' => $reservation->idreservation,
                            'Cliente' => $reservation->customer->trade_name, 
                            'Desde'  => $reservation->from,
                            'Hasta' => $reservation->to,
                            'Fecha reserva' => $reservation->reservation_date,
                            'Hora reserva' => $reservation->reservation_hour,
                            'Tipo de pago' => $type_pay,
                            'Voucher' => $reservation->voucher,
                            'Estado reserva' => $status,
                            'Fecha liquidación' => $reservation->settlement_date,
                            'Responsable reserva' => $reservation->contact_person,
                            'Nro de pasajeros' => $reservation->passenger_number, 
                            'Nombre pasajero' => $reservation->passenger_name, 
                            'Contacto pasajero' => $reservation->passenger_cel, 
                            'Observaciones' => $reservation->comments, 
                            'Detalle vuelo' => $reservation->flight_details,
                            'Creado en' => $reservation->created_at,
                            'Actualizado en' => $reservation->updated_at
                        ];
                        var_dump($resultado); exit;
        
                        fputcsv($archivo_salida, $resultado, ';');
                    }
                    fclose($archivo_salida);
                    Yii::$app->session->setFlash('success', "Reporte generado correctamente.");    
                    exit;
                } else {
                    Yii::$app->session->setFlash('error', "No se encontro información con los filtros aplicados.");    
                }
            } else {
                Yii::$app->session->setFlash('error', "Debe seleccionar una fecha inicial.");
            }
        }

        return $this->render('download');
    }

    //Desde el código apoyamos el paro nacional
}
