<?php
$ar_rate=array(
"5"=>"満足",
"4"=>"やや満足",
"3"=>"普通",
"2"=>"やや不満",
"1"=>"不満",
);


foreach($ar_rate as $key=>$value){
  echo "<input type=\"radio\" name=\"rate\" value=\"{$key}\">{$value} ";
}