<?php

var_dump($products);
foreach ($products as $key => $value) {
  $totalPrice += $products[$key]->total_price;
  $str .= "
  <article class='ShoppingCartProduct'>
      <div class='ShoppingCartProduct__productdetails'>
          <div class='ShoppingCartProduct__image'>
              <a href='#'><img width='100' height='115' src='{$products[$key]->img_src}' alt='product1'></a>
          </div>
          <div class='ShoppingCartProduct__description'>
              <p class='ShoppingCartProduct__description_ProductName'>{$products[$key]->name}</p>
              <p>
                  <span class='ShoppingCartProduct__description_ProductChar'>Color:</span>
                  <span class='ShoppingCartProduct__description_ProductCharName'>Red</span>
              </p>
              <p>
                  <span class='ShoppingCartProduct__description_ProductChar'>Size:</span>
                  <span class='ShoppingCartProduct__description_ProductCharName'>Xll</span>
              </p>
          </div>
      </div>
      <div class='ShoppingCartProduct__unitPrice'>
          <p>$ {$products[$key]->price}</p>
      </div>
      <div style='display: flex; align-items: center' >
          <div><a href='/cart/add?id={$products[$key]->id}' style='text-decoration: none; margin: 0 2px'>+</a></div>
          <input class='ShoppingCartProduct__quantity' type='text' disabled value='{$products[$key]->q_ty}'>
          <div><a href='/cart/del?id={$products[$key]->id}' style='text-decoration: none; margin: 0 2px'>-</a></div>
      </div>
      <div class='ShoppingCartProduct__shipping'>
          <p>FREE</p>
      </div>
      <div class='ShoppingCartProduct__subtotal'>
          <p >$ {$products[$key]->total_price}</p>
      </div>
      <a class='ShoppingCartProduct__action' href='/cart/remove?id={$products[$key]->id}'>
          <i class='fas fa-times-circle'></i>
      </a>
  </article>";
}

echo $str;