<?php

namespace frontend\controllers;

use settings\forms\user\UserProfileForm;
use settings\repositories\UserProfileRepository;
use settings\repositories\UserRepository;
use settings\services\user\UserProfileService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class UserProfileController extends Controller
{
    private $userProfileService;
    private $userProfileRepository;
    private $userRepository;

    public function __construct($id, $module,
        UserProfileService $userProfileService,
        UserProfileRepository $userProfileRepository,
        UserRepository $userRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->userProfileService = $userProfileService;
        $this->userProfileRepository = $userProfileRepository;
        $this->userRepository = $userRepository;
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

    /**
     * @param $id
     * @return string|Response
     */
    public function actionCreate($id)
    {
        $user = $this->userRepository->get($id);
        $form = new UserProfileForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userProfileService->create($user->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Profil saqlandi'));
                return $this->redirect(['user-profile/update', 'id' => $user->id]);
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
        $model = $this->userProfileRepository->get($id);
        $form = new UserProfileForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userProfileService->edit($model->user_id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Profil yangilandi'));
                return $this->redirect(Yii::$app->request->referrer);
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
}