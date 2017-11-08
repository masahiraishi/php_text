<?php
$y = 2012;
$m = 2;

$d = 1;
while(checkdate($m,$d,$y)){
  echo $d;
}