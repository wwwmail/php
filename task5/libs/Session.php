<?php


class Session implements iWorkData
{


    public function __construct()
    {
        session_start();
    } 

    public function saveData($key, $val)
    {

        return $_SESSION[$key] = $val;
    }

    public function getData($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return NOT_EXIST;
        }
    }

    public function deleteData($key)
    {
        if(isset($_SESSION[$key])){

            unset($_SESSION[$key]);     
            return true;
        }else{
            return NOT_EXIST;
        }
    }

}
