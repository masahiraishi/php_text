<?php
$ar =array("東京","千葉","神奈川",);
$ar[]="埼玉";

$rand=array_rand($ar);
echo $ar[$rand];