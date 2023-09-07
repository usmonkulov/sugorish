<?php

namespace frontend\controllers\irrigation;

use settings\forms\irrigation\RoadIrrigationTaskForm;
use settings\forms\irrigation\search\RoadSearchForm;
use settings\readModels\irrigation\RoadReadRepository;
use settings\repositories\irrigation\RoadRepository;
use settings\services\irrigation\RoadIrrigationTaskService;
use settings\services\irrigation\RoadService;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class RoadController extends Controller
{
    private $roadService;
    private $roadReadRepository;
    private $roadRepository;
    private $irrigationTaskService;

    public function __construct($id, $module,
        RoadService $roadService,
        RoadReadRepository $roadReadRepository,
        RoadRepository $roadRepository,
        RoadIrrigationTaskService $irrigationTaskService,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->roadService = $roadService;
        $this->roadReadRepository = $roadReadRepository;
        $this->roadRepository = $roadRepository;
        $this->irrigationTaskService = $irrigationTaskService;
    }

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new RoadSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->roadReadRepository->frontendSearch($searchForm);

        return $this->render('index', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string|Response
     */
    public function actionRoadListIrrigationTaskCreate($id)
    {
        $model = $this->roadRepository->get($id);
        $form = new RoadIrrigationTaskForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->irrigationTaskService->create($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', $model->type->code_name . $model->code_name . ' ' . $model->title_oz .' '.  $model->coordination . " sug'orilidi"));
                return $this->redirect(Yii::$app->request->referrer);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('road-list-irrigation-task-create', [
            'form' => $form,
            'model' => $model,
        ]);
    }
}