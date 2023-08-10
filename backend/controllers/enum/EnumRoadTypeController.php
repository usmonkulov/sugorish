<?php

namespace backend\controllers\enum;

use settings\forms\enum\EnumRoadTypeForm;
use settings\forms\enum\search\EnumRoadTypeSearchForm;
use settings\readModels\enum\EnumRoadTypeReadRepository;
use settings\repositories\enum\EnumRoadTypeRepository;
use settings\services\enum\EnumRoadTypeService;
use settings\status\enum\EnumRoadTypeStatus;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class EnumRoadTypeController extends Controller
{
    private $typeService;
    private $typeReadRepository;
    private $typeRepository;

    public function __construct($id, $module,
        EnumRoadTypeService $typeService,
        EnumRoadTypeReadRepository $typeReadRepository,
        EnumRoadTypeRepository $typeRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->typeService = $typeService;
        $this->typeReadRepository = $typeReadRepository;
        $this->typeRepository = $typeRepository;
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
        $searchForm = new EnumRoadTypeSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->typeReadRepository->search($searchForm);

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
        $road = $this->typeRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new EnumRoadTypeForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->typeService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Yo\'l turi saqlandi'));
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
        $model = $this->typeRepository->get($id);
        $form = new EnumRoadTypeForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->typeService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Yo\'l turi yangilandi').' (id: '.$model->id.')');
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
            $type = $this->typeRepository->get($id);
            $this->typeService->activate($type->id);
            Yii::$app->session->setFlash('success', EnumRoadTypeStatus::getLabel(!$type->status).' (id: '.$type->id.') (title: '.$type->title_uz.')');
            if($status == 'index'){
                return $this->redirect('index');
            } elseif ($status == 'view') {
                return $this->redirect(['view', 'id' => $type->id]);
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
            $this->typeService->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}