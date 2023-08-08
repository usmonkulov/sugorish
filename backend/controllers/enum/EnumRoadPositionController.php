<?php

namespace backend\controllers\enum;

use settings\forms\enum\EnumRoadPositionForm;
use settings\forms\enum\search\EnumRoadPositionSearchForm;
use settings\readModels\enum\EnumRoadPositionReadRepository;
use settings\repositories\enum\EnumRoadPositionRepository;
use settings\services\enum\EnumRoadPositionService;
use settings\status\enum\EnumRoadPositionStatus;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class EnumRoadPositionController extends Controller
{
    private $positionService;
    private $positionReadRepository;
    private $positionRepository;

    public function __construct($id, $module,
        EnumRoadPositionService $positionService,
        EnumRoadPositionReadRepository $positionReadRepository,
        EnumRoadPositionRepository $positionRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->positionService = $positionService;
        $this->positionReadRepository = $positionReadRepository;
        $this->positionRepository = $positionRepository;
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
        $searchForm = new EnumRoadPositionSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->positionReadRepository->search($searchForm);

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
        $road = $this->positionRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new EnumRoadPositionForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->positionService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Lavozim saqlandi'));
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
        $model = $this->positionRepository->get($id);
        $form = new EnumRoadPositionForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->positionService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Lavozim yangilandi').' (id: '.$model->id.')');
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

    public function actionActivate($id, $status)
    {
        try {
            $position = $this->positionRepository->get($id);
            $this->positionService->activate($position->id);
            Yii::$app->session->setFlash('success', EnumRoadPositionStatus::getLabel(!$position->status).' (id: '.$position->id.') (title: '.$position->title_uz.')');
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
            $this->positionService->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}