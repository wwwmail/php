<?php
include ('config.php');
include ('libs/Calculator.php');

 $obj = new Calculator();

$obj->setA(3);

$obj->setB(4);


$a = $obj->getA();
$b = $obj->getB();

//echo $obj->addition();
$addition = "$a + $b = ". $obj->addition();

$subtraction = "$a - $b = ". $obj->subtraction();

$multiplication ="$a * $b = ".  $obj->multiplication();

$division = "$a / $b = ". $obj->division();

$involution ="$a ^ $b = ".  $obj->involution();

$evolution = "evolution of $a  = ". $obj->evolution();


$setMemory = 3;
$obj->setMemory($setMemory);

$getMemory = $obj->getMemory();
$memory = "set memory: $setMemory, memory = $getMemory";

$setMemory2 = 5;
$obj->setMemory($setMemory2);
$getMemory2 = $obj->getMemory();

$memory2 = "set memory2: $setMemory2, memory = $getMemory2";


$obj->resetMemory();

$resMem = $obj->getMemory();
$reset =" after reset memory = $resMem";

include('template/index.php');



