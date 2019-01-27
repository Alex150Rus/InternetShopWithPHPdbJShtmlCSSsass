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

class UserController
{
  public function login()
  {
    App::call()->request->getHttpReferrer();
    $userRepository = new UserRepository();
    $formInfo = $userRepository->getFormInfo();
    $userRepository->ifUserExists($formInfo);
  }

  public function register()
  {
    App::call()->request->getHttpReferrer();
    $userRepository = new UserRepository();
    $formInfo = $userRepository->getFormInfo();
    if (!$userRepository->ifUserExists($formInfo)) {
      $userRepository->addUserToDb($formInfo);
    };

  }
}