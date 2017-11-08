<?php
function h(){
  return htmlspecialchars($a,ENT_QUOTES,"UTF-8");
}

$a="<b>テスト</b>";
$a=h($a)


echo $a;
?>