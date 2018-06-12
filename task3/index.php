<?php
include ('config.php');
include ('libs/File.php');

$obj = new File();

$obj->setFileContent(PATH_TO_FILE.'/text.txt');


$fileArray = $obj->getFileContent();


$printFileBefore = $obj->printContent();
$numStr = 5;
$numSymb = 3;
$string = $obj->getStringFromFile($numStr);
$symbol = $obj->getSymbolFromFile($numStr, $numSymb);



$numStrRep = 5;
$numSymbRep = 3;
$repSymb = 'U';
$beforeRep = $obj->getStringFromFile($numStrRep);
$replace_symbol = $obj->replaceSymbol($numStrRep, $numSymbRep, $repSymb);
$check_symbol = $obj-> getStringFromFile($numStrRep);




$numStringRep = 5;
$repString = 'some string for replace';
//$fileBeforRepStr = $obj->printFile();
$resRepString = $obj->replaceString($numStringRep, $repString);
$checkRepString = $obj->getStringFromFile($numStringRep);


$fileArray = $obj->getFileContent();


$printFileAfter = $obj->printContent();

$save_file = $obj->saveChanges(PATH_TO_SAVE_FILES,'some_name22.txt');



 

//$obj->saveChenges('/var/www/html/domains/test.test/php/task3/files','new.txt');

include('template/index.php');
