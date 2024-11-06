<?php


$values=array();
$values[0]=$_POST["a"];
$values[1]=$_POST["b"];
$values[2]=$_POST["c"];
$values[3]=$_POST["d"];
$values[4]=$_POST["e"];

$result=0;

for($i=0;$i<count($values);$i++)
{
    $result+=$values[$i];
}

echo "El resultado es $result";