<?php
echo ini_get('upload_max_filesize');

include ('config.php');
include ('function.php');

$info = '';

$files = get_files_list(DOWNLOAD_DIR);


if(isset($_FILES['file_name'])){
 
        $info =  add_file($_FILES['file_name']);
}

if(isset($_POST['del_file']) && isset($_POST['file_name_for_del'])){

    $info = delete_file($_POST['file_name_for_del']);             
}


include ('template/index.php');

