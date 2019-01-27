<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 21.01.2019
 * Time: 22:42
 */

namespace app\models\repositories;

use app\models\Order;


class OrderRepository extends Repository
{

  public function __construct($cart = null, $id=null)
  {
    parent::__construct();
    new SessionRepository ($cart, $id);
  }

  public function getOrder() {
    return (new SessionRepository())->getCart();
  }

  public function decreaseItemQ_ty($id) {
    (new SessionRepository()) ->decreaseItemQ_ty($id);
  }

  public function deleteItem($id) {
    (new SessionRepository()) -> deleteItem($id);
  }

  public function clearOrder() {
    (new SessionRepository()) -> clearCart();
  }

  public function getTableName() :string
  {
    return 'orders';
  }

  function getRecordClass()
  {
    return Order::class;
  }
}