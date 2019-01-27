<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 18.01.2019
 * Time: 7:13
 */

namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\models\repositories\SessionRepository;
use app\models\repositories\CartRepository;
use app\base\App;

class ProductController extends Controller
{
  //дефолтный экшн - рисует каталог
  public function actionIndex() {

    //создаём необходимую сущность для отрисовки, вытаскивая нужную инфу из БД
    new SessionRepository();
    $products = (new ProductRepository())->getAll();
    // отправляем на отрисовку
    echo $this->render("featureditems", ['product'=>$products, 'className'=>$this->getClassName()]);
  }

  public function actionDel()
  {
    App::call()->request->getHttpReferrer();
    $id =  App::call()->request->getParams()['id'];
    (new CartRepository())->deleteItem($id);
  }

  //public function actionCard() {
  //  // для этого метода не применяем статическую часть сайта
  //  $this->useLayout = false;
  //  //получаем id us url (прилетит туда гет запросом)
  //  $id = (new Request())->getParams()['id'];
  //  //создаём необходимую сущность для отрисовки, вытаскивая нужную инфу из БД
  //  $product = (new ProductRepository())->getOne($id);
  //  // отправляем на отрисовку
  // echo $this->render("card", ['product'=>$product, 'className'=>$this->getClassName()]);
  //}

  public function getClassName() {
    return 'product';
  }
}