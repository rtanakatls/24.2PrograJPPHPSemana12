<?php

$name=$_POST["name"];
$age=$_POST["age"];
echo "Hola ".$name;
echo "<br>";
echo "Tienes $age años";
echo "<br>";
echo "En medio año tendrás ".($age+0.5);