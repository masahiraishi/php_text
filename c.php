<?php
$message = array(
  "sun"=>"今日は定休日です。",
  "mon"=>"9時から22時まで営業",
  "tue"=>"9時から22時まで営業",
  "wed"=>"特売日！7時から24時まで営業",
  "thu"=>"9時から22時まで営業",
  "fri"=>"9時から22時まで営業",
  "sat"=>"12時から20時まで営業",
);

$w=date("w");
echo $message["sun"];

