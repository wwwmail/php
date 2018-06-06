<?php

include ('config.php');
include ('function.php');

$info = '';

if(isset($_FILES['file_name'])  && !empty($_FILES['file_name']['name'])){
 
        $info =  add_file($_FILES['file_name']);
}

if(isset($_POST['del_file']) && isset($_POST['file_name_for_del'])){

    $info = delete_file($_POST['file_name_for_del']);             
}

$files = get_files_list(DOWNLOAD_DIR);


include ('template/index.php');

