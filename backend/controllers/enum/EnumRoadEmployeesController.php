<?php

namespace backend\controllers\enum;

use settings\forms\enum\EnumRoadEmployeesForm;
use settings\forms\enum\search\EnumRoadEmployeesSearchForm;
use settings\readModels\enum\EnumRoadEmployeesReadRepository;
use settings\repositories\enum\EnumRoadEmployeesRepository;
use settings\services\enum\EnumRoadEmployeesService;
use settings\status\enum\EnumRoadEmployeesStatus;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class EnumRoadEmployeesController extends Controller
{
    private $employeesService;
    private $employeesReadRepository;
    private $employeesRepository;

    public function __construct($id, $module,
        EnumRoadEmployeesService        $employeesService,
        EnumRoadEmployeesReadRepository $employeesReadRepository,
        EnumRoadEmployeesRepository     $employeesRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->employeesService = $employeesService;
        $this->employeesReadRepository = $employeesReadRepository;
        $this->employeesRepository = $employeesRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new EnumRoadEmployeesSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->employeesReadRepository->search($searchForm);

        return $this->render('index', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @param $id
     * @return string
     */
    public function actionView($id): string
    {
        $road = $this->employeesRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new EnumRoadEmployeesForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->employeesService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Hodim saqlandi'));
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'form' => $form,
            'model' => null,
        ]);
    }

    /**
     * @param $id
     * @return string|Response
     */
    public function actionUpdate($id)
    {
        $model = $this->employeesRepository->get($id);
        $form = new EnumRoadEmployeesForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->employeesService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Hodim yangilandi').' (id: '.$model->id.')');
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'form' => $form,
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @param $status
     * @return Response
     */
    public function actionActivate($id, $status)
    {
        try {
            $position = $this->employeesRepository->get($id);
            $this->employeesService->activate($position->id);
            Yii::$app->session->setFlash('success', EnumRoadEmployeesStatus::getLabel(!$position->status).' (id: '.$position->id.') (title: '.$position->first_name.')');
            if($status == 'index'){
                return $this->redirect('index');
            } elseif ($status == 'view') {
                return $this->redirect(['view', 'id' => $position->id]);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return Response
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        try {
            $this->employeesService->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}