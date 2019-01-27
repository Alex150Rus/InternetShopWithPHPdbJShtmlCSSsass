<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 27.01.2019
 * Time: 12:52
 */

namespace app\controllers;

use app\models\repositories\OrderRepository;


class OrderController extends Controller
{
  public function actionIndex() {
    $productsInOrder = (new OrderRepository())->getOrder();
    if (!$productsInOrder) {
      $productsInOrder = [];
    }
    echo $this->render("order", ['products' => $productsInOrder, 'className'=>$this->getClassName()]);
  }

  public function getClassName() {
    return 'order';
  }
}