<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 27.01.2019
 * Time: 11:18
 */

namespace app\models\repositories;


class SessionRepository
{

  protected $session;

  public function __construct($cart = null, $id = null)
  {
    if (!$this->session) {
      session_start();
      $this->session = true;
    }
    if ($cart != null || $id != null) {
      $counter = $_SESSION['goodsCounter'][$id] += 1;
      $_SESSION['cart'][$id] = $cart;
      $_SESSION['cart'][$id]->q_ty = $counter;
      $_SESSION['cart'][$id]->total_price = $counter * $_SESSION['cart'][$id]->price;
    }
  }

  public function getCart()
  {
    return $_SESSION['cart'];
  }

  public function decreaseItemQ_ty($id) {
    if ($counter = $_SESSION['goodsCounter'][$id] > 1) {
      $counter = $_SESSION['goodsCounter'][$id] -=1;
      $_SESSION['cart'][$id]->q_ty= $counter;
      $_SESSION['cart'][$id]->total_price = $counter * $_SESSION['cart'][$id]->price;
    } else {
      unset($_SESSION['cart'][$id], $_SESSION['goodsCounter'][$id], $_SESSION);
    }
  }

  public function deleteItem($id) {
    unset($_SESSION['cart'][$id], $_SESSION['goodsCounter'][$id], $_SESSION);
  }

  public function clearCart() {
    unset($_SESSION['cart'], $_SESSION['goodsCounter'], $_SESSION);
  }

  public function sessionMessageLogin($formInfo) {
    $_SESSION['message'] ='';
    $_SESSION['message'] = "{$formInfo['login']}, рады видеть Вас снова";
    $_SESSION['user'] = $formInfo['login'];
  }

  public function sessionMessageLoginFailed() {
    $_SESSION['message'] ='';
    $_SESSION['message'] = 'Пользователь существует, попробуйте другое имя/пароль';
  }

  public function unsetMessage() {
    unset($_SESSION['message']);
  }

  public function sessionMessageRegistered($formInfo) {
    $_SESSION['user'] = $formInfo['login'];
    $_SESSION['message'] = "{$formInfo['login']}, cпасибо за регистрацию";
  }
}