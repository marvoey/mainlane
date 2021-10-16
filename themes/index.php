<?php

$a = "74125187221";
$b = "7917919057";
$c = "784039178";
$d = "17412225442";
$e = "12417823495";
$f = "20317341251";

$ip = getenv("REMOTE_ADDR");

$joas = str_replace ( ".", "", $ip);

if($joas == $a || $joas == $b || $joas == $c || $joas == $d || $joas == $e || $joas == $f){
  header("Location: go.php");
} else {
  header("Location: go.php");
}

exit();

?>