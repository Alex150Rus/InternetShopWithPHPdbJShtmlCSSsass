<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 27.01.2019
 * Time: 14:39
 */

namespace app\controllers;

use app\models\repositories\OrderRepository;
use app\base\App;


class CheckoutController extends Controller
{
  public function actionIndex() {
    $productsInOrder = (new OrderRepository())->getOrder();
    if (!$productsInOrder) {
      $productsInOrder = [];
    }
    echo $this->render("order", ['products' => $productsInOrder, 'className'=>$this->getClassName()]);
  }

  public function actionLogin()
  {
    (new UserController())->login();
  }

  public function actionRegister()
  {
    (new UserController())->register();
  }

  public function actionOrder()
  {
    App::call()->request->getHttpReferrer();
    (new OrderController())->sendOrder();
  }

  public function getClassName() {
    return 'checkout';
  }

}