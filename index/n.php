<?php
    // 年月を習得する
    $ym_now=date(" Ym");
    $y=substr($ym_now,0,4);
    $m=substr($ym_now,4,2);

?>

<table border="1">
  <tr>
    <th>日</th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
    <th>土</th>
  </tr>
  <tr>
<?php

      // 1日の曜日番号を取得
      $wd1 = date("w",mktime(0,0,0,$m,1,$y));

      // その数だけ空白を表示
      for ($i = 1; $i <= $wd1; $i++){
        echo "<td> </td>";
      }

      // 1日から月末日までの表示
      $d = 1;
      while(checkdate($m, $d, $y)){
        echo "<td>$d</td>";
          $d++;

        // 土曜日な場合は
        if (date("w",mktime(0,0,0,$m,$d,$y))==6){
            // 州を終了
          echo "</tr>";
            // 次の週がある場合は新たな行を用意
          if(checkdate($m,$d,+1,$d)){
            echo "<tr>";
          }
        }
        $d++;
      }
      // 最後の週の土曜日まで移動
      $wdx=date("w",mktime(0,0,0,$m+1,0,$y));
        for  ($i=1; $i <7 - $wdx; $i++){
          echo "<td> </td>";
        }

    ?>
  </tr>
</table>