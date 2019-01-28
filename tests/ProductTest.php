<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 28.01.2019
 * Time: 17:38
 */


class ProductTest extends \PHPUnit\Framework\TestCase
{
public function testGetClassName(){
  $product = new \app\models\Product();
  $this->assertEquals('app\models\Product', $product->getClassName());
}
}