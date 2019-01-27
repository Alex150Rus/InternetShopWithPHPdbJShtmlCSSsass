<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 11.01.2019
 * Time: 0:41
 */

namespace app\models;


class Order extends Record
{
  public $id;
  public $order;
  public $user;
  public $status = 'new';

  public function __construct($id = null, $order = null, $user = null, $status = 'new')
  {
    $this->id = $id;
    $this->order = $order;
    $this->user = $user;
    $this->status = $status;
  }
}