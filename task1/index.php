<?php
include ('config.php');
include ('function.php');
//include ('template/index.php');


$info = '';

$files = get_files_list(DOWNLOAD_DIR);


if(isset($_FILES['file_name'])){

 
        $info =  add_file($_FILES['file_name']);

       // print_r($a);
       
}

if(isset($_POST['del_file']) && isset($_POST['file_name_for_del'])){

    $info = delete_file($_POST['file_name_for_del']);             
}

var_dump($info); 

if($info == true){
    $info == "Succes!";
}





















include ('template/index.php');

