<?php

namespace backend\controllers;

use settings\forms\user\UserProfileForm;
use settings\repositories\UserProfileRepository;
use settings\services\user\UserProfileService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class UserProfileController extends Controller
{
    private $userProfileService;
    private $userProfileRepository;

    public function __construct($id, $module,
        UserProfileService $userProfileService,
        UserProfileRepository $userProfileRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->userProfileService = $userProfileService;
        $this->userProfileRepository = $userProfileRepository;
    }

    public function behaviors(): array
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

    public function actionCreate()
    {
        $form = new UserProfileForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            echo "<pre>";
            print_r(Yii::$app->request->post());
//            try {
//                $this->userProfileService->create($form);
//                Yii::$app->session->setFlash('success', Yii::t('app', 'Profil saqlandi'));
//                return $this->redirect(['view', 'id' => Yii::$app->user->id]);
//            } catch (\DomainException $e) {
//                Yii::$app->errorHandler->logException($e);
//                Yii::$app->session->setFlash('error', $e->getMessage());
//            }
        }
        return $this->render('create', [
            'form' => $form,
            'model' => null,
        ]);
    }
}