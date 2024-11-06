<?php
header("Content-Type: application/json");

$a=$_POST["number1"];
$b=$_POST["number2"];
$addition=$a+$b;
$substraction=$a-$b;
$multiplication=$a*$b;
$division=$a/$b;
echo json_encode(
    ["addition"=>$addition,
    "substraction"=>$substraction,
    "multiplication"=>$multiplication,
    "division"=>$division
]);