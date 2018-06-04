<?php
include ('config.php');
include ('function.php');
//include ('template/index.php');




$files = get_files_list(DOWNLOAD_DIR);


if(isset($_FILES['file_name'])){

 
        $error  =  add_file($_FILES['file_name']);

       // print_r($a);
       
}

if(isset($_POST['del_file']) && isset($_POST['file_name_for_del'])){

    $error = delete_file($_POST['file_name_for_del']);             
}






















include ('template/index.php');

