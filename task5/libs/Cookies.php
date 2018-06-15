<?php



class Cookies implements iWorkData
{

    public function saveData($key, $val)
    {
        return setcookie($key, $val);
    }
    public function getData($key)
    {
        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }else{
            return NOT_EXIST;
        }
    }
    public function deleteData($key)
    {
        if(isset($_COOKIE[$key])){
            unset($_COOKIE[$key]);     
            return setcookie($key, '', time() - 3600);
        }else{
            return NOT_EXIST;
        }
    }
}
