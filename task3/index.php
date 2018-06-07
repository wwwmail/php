<?php
include ('config.php');
include ('libs/File.php');







$obj = new File();

$obj->setFileContent('text.txt');

$fileArray = $obj->getFileContent();


echo "<pre>";


$string = $obj->getStringFromFile(3);



var_dump($string);


include('template/index.php');
