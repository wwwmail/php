<?php

function change_permissions($file_path, $permission = '0644'){

        if( chmod($file_path, $permission)){
                return true;
        }else{
                return false;
        }

}


function check_downloads_dir($path_to_dir){

    if(is_writable($path_to_dir)){
        return true;
    }else{  
        return PERMISSION_DIR;
    }

}

function check_is_can_del($path){
    
    if(is_writable($path)){
        return true;
    }else{
        return PERMISSION_FILE;
    }
}

function check_is_readable($path){
    
        if (is_readable($path)){
            return true;
        }else{
            return READABLE_DIR;
        }
}

function get_files_list($dir){

    $return_array = [];

    if (true === check_is_readable($dir)) {
        $directory = new DirectoryIterator($dir);
        $i = 0;
        foreach ($directory as $fileinfo) {

            if ($fileinfo->isDot())
                continue;
            $i++;
            $return_array[] = [
                'name' => "$fileinfo",
                'size' => filesize_formatted($fileinfo->getSize()),
                'number' => $i,
                'path_to_file' => $dir . "/" . $fileinfo,
            ];
        }


        return $return_array;
    }else {
        return check_is_readable($dir);
    }
}

function filesize_formatted($size)
{
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}


function check_file_exist($path){
    if(file_exists($path)){
       return FILE_EXIST;
    }else{
        return true;
    }

}


function add_file($array)
{
    if (true === check_downloads_dir(DOWNLOAD_DIR)) {
        if (true === check_file_exist(DOWNLOAD_DIR . "/" . $array['name'])) {
            $uploads_dir = DOWNLOAD_DIR;
            $name = $array['name'];
            $tmp_name = $array['tmp_name'];
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            change_permissions("$uploads_dir/$name", 0777);
            return true;
        } else {
            return check_file_exist(DOWNLOAD_DIR . "/" . $array['name']);
        }
    } else {
        return check_downloads_dir(DOWNLOAD_DIR);
    }
}

function delete_file($path){
        if(true === check_is_can_del($path)){       
                
                if(unlink($path)){
                    return true;
                }
        }else{
                return check_is_can_del($path);
        }
}


