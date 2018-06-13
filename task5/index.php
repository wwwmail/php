<?php
include ('config.php');
include ('libs/iWorkData.php');
include ('libs/Cookies.php');
include ('libs/MySql.php');




//$objC = new Cookies();



//$objC->saveData('key', '123429');


//echo $objC->getData('key');

//$objC->deleteData('key');



$objM = new MySql();

$a = $objM->saveData('first_key','first value for key');

$b = $objM->getData('first_key');


echo '<pre>';
var_dump($b);
var_dump($a);
