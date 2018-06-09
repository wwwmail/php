<?php
include ('config.php');
include ('libs/File.php');


//
//$a = 'test';
//if(isset($a[5]))
//var_dump($a[5]);
//die;



$obj = new File();

$obj->setFileContent('files/text.txt');


$fileArray = $obj->getFileContent();

echo "<pre>";


//$string = $obj->getStringFromFile(5);
$string = $obj->getSymbolFromFile(5, 3);

$obj->replaceSymbol(2, 4, 's');


$fileArray = $obj->getFileContent();


$obj->saveChanges('/var/www/html/domains/test.test/php/task3/files/new5.txt');


//$obj->saveChenges('/var/www/html/domains/test.test/php/task3/files','new.txt');

include('template/index.php');
