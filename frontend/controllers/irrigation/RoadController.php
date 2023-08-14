<?php
namespace frontend\controllers\irrigation;


use settings\forms\irrigation\search\RoadSearchForm;
use settings\readModels\irrigation\RoadReadRepository;
use settings\repositories\irrigation\RoadRepository;
use settings\services\irrigation\RoadService;
use Yii;
use yii\web\Controller;

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

    public function actionIndex(): string
    {
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new RoadSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->roadReadRepository->search($searchForm);

        return $this->render('index', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }
}