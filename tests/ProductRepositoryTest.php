<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 28.01.2019
 * Time: 15:08
 */

use app\models\repositories\ProductRepository;

class ProductRepositoryTest extends \PHPUnit\Framework\TestCase
{
  // работает, когда из конструктора рерозитория убираю обращение к собственномук методу получения БД
 public function testGetTableName(){

   $userRepository = new ProductRepository();
   $str = $userRepository->getTableName();
   $this->assertEquals('featureditems', $str);
 }
}