<?php
include ('config.php');
include ('libs/HtmlHelper.php');




$select = HtmlHelper::getSelect(['bmw', 'audi', 'skoda']);

$multiSelect = HtmlHelper::getSelect(['bmw', 'audi', 'skoda'],
                                     ['id'=>'unicForm', 'size'=>'2' ],  true);





$data = array(
    array('Name', 'Color', 'Size'),
    array('Fred', 'Blue', 'Small'),
    array('Mary', 'Red', 'Large'),
    array('John', 'Green', 'Medium')
);

//$data = array(); 
$params = array('border'=>'1px');

$table = HtmlHelper::getTable($data,$params);

$listData = array('php', 'js', 'mysql', 'yii2');

$simpleList = HtmlHelper::getListSimple($listData);

$numList = HtmlHelper::getListNum($listData);

$dataDl = array('git'=>'Git is a version control system for tracking changes',
                'svn'=>'Apache Subversion is a software versioning and revision control system distributed as open sourc'
            );

$dl = HtmlHelper::getDl($dataDl);


$dataRadio = array('Meat','Milk','Juce');

$radio = HtmlHelper::getRadio($dataRadio,'food');


$dataCheckbox = array('git'=>'Git','php'=>'PHP', 'prog'=>'Coding');

$checkbox = HtmlHelper::getCheckbox($dataCheckbox);

include ('template/index.php');
