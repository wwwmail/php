<?php
include ('config.php');
include ('libs/Calculator.php');

 $obj = new Calculator();

$addition =  $obj->calculate('addition',3,5);

$subtraction =  $obj->calculate('subtraction',3,5);

$multiplication =  $obj->calculate('multiplication',3,5);

$division =  $obj->calculate('division',3,5);

$invulution =  $obj->calculate('invulution',3,5);

$evolution =  $obj->calculate('evolution',3,5);

$addition =  $obj->calculate('addition',3,5);


var_dump( $a);
