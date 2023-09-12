<?php

namespace backend\controllers\irrigation;

use settings\forms\irrigation\RoadForm;
use settings\forms\irrigation\search\RoadSearchForm;
use settings\readModels\irrigation\RoadReadRepository;
use settings\repositories\irrigation\RoadRepository;
use settings\services\irrigation\RoadService;
use settings\status\irrigation\RoadStatus;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * RoadController implements the CRUD actions for Road model.
 */
class RoadController extends Controller
{
    private $roadService;
    private $roadReadRepository;
    private $roadRepository;

    public function __construct($id, $module,
        RoadService $roadService,
        RoadReadRepository $roadReadRepository,
        RoadRepository $roadRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->roadService = $roadService;
        $this->roadReadRepository = $roadReadRepository;
        $this->roadRepository = $roadRepository;
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
        $searchForm = new RoadSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->roadReadRepository->backendSearch($searchForm);

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
        $road = $this->roadRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new RoadForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->roadService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Yo\'l saqlandi'));
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
        $model = $this->roadRepository->get($id);
        $form = new RoadForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->roadService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Yo\'l yangilandi').' (id: '.$model->id.')');
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
            $road = $this->roadRepository->get($id);
            $this->roadService->activate($road->id);
            Yii::$app->session->setFlash('success', RoadStatus::getLabel(!$road->status).' (id: '.$road->id.') (title: '.$road->title_oz.')');
            if($status == 'index'){
                return $this->redirect('index');
            } elseif ($status == 'view') {
                return $this->redirect(['view', 'id' => $road->id]);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return Response
     */
    public function actionDelete($id)
    {
        try {
            $this->roadService->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}
