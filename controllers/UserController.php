<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 19.01.2019
 * Time: 3:32
 */

namespace app\controllers;


use app\models\repositories\UserRepository;
use app\base\App;

class UserController extends Controller
{

  public function actionLogin()
  {
    App::call()->request->getHttpReferrer();
    $userRepository = new UserRepository();
    $formInfo = $userRepository->getFormInfo();
    $userRepository->ifUserExists($formInfo);
  }

  public function actionRegister()
  {
    App::call()->request->getHttpReferrer();
    $userRepository = new UserRepository();
    $formInfo = $userRepository->getFormInfo();
    if (!$userRepository->ifUserExists($formInfo)) {
      $userRepository->addUserToDb($formInfo);
    };

  }

  public function getClassName() {
    return 'user';
  }
}