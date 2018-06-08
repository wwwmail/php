<?php

class Post
{

    private $arrayOfData = [];

    public function setArrayOfData(array $array)
    {
        if(is_array($array) && count($array) > 0){
                foreach ($array as $value){
                    $this->$arrayOfData[] = trip_tags(trim($value));
                }
                $this->$arrayOfData = $array;
        }
    }

    public function getArrayData()
    {
        return $this->arrayOfData;
    }

    public function checkIfPost()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            return true;
        }else{
            return "please use post method for more security";
        }
    }
}
