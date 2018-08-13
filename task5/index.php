<?php
include ('config.php');
include ('libs/WorkDataException.php');
include ('libs/iWorkData.php');
include ('libs/Cookies.php');
include ('libs/MySql.php');
include ('libs/Session.php');


try{

$objC = new Cookies();



//$objC->saveData('key', '123429');


$cookie = $objC->getData('key');

//$objC->deleteData('key');



$objM = new MySql();

$b = $objM->saveData('11','ee');

$mysql = $objM->getData('11');
//$objM->deleteData('first_key2');

$objS = new Session();

//$objS->saveData('key1', 'ZzQQi');

$session = $objS->getData('key1');
// $objS->deleteData('key1');

include('template/index.php');

} catch(WorkDataException $e){

echo $e->getMessage();
}

