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
 public function testGetTableName(){
   $userRepository = new ProductRepository();
   $str = $userRepository->getTableName();
   $this->assertEquals('users', $str);
   $this->assertNan($str);
 }
}