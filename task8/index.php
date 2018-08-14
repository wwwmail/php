<?php
/*
header('Content-type: text/html; charset=UTF-8');
header('Content-Type","application/x-www-form-urlencoded;charset=utf-8');
 */
include ('libs/phpQuery.php');
include ('libs/Search.php');


$data = array();
$search = '';
if(isset($_POST['search'])){
    
    $search = $_POST['search'];
    $obj = new Search(); 

    $data =  $obj->getSearchData($search);

}


include ('templates/index.php');





