<?php
function total_price($price){
  if ($price<3000){
    $price+=500;
  }
  return $price;
}

//ユーザー関数を呼び出す
echo total_price(2000);