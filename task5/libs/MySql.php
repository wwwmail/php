<?php

class MySql implements iWorkData
{
    const HOST = "localhost";
    const DB_NAME = "user4";
    const DB_USER = "user4";
    const DB_PASS = "user4";

    
    private function getConnect()
    {


        try {
            return new PDO("mysql:host=".self::HOST.";dbname=".self::DB_NAME,  self::DB_USER, self::DB_PASS );

        } catch (PDOException $e) {
            print "Error!: you dont have access to DataBase";
            die();
        }



    } 
    public function saveData($key, $val)
    {
        $db = $this->getConnect();

        if(!$this->checkKey($key)){
            $sql = "INSERT INTO `key_value` 
                (key_name, value_name)
                VALUES
                (:key_name, :value_name)";

            $result = $db->prepare($sql);
            $result->bindParam(':key_name', $key, PDO::PARAM_STR);
            $result->bindParam(':value_name', $val, PDO::PARAM_STR);

            return $result->execute();
        }else{
            return KEY_EXIST;
        }

    }

    public function getData($key)
    {
        if($this->checkKey($key)){
            $db = $this->getConnect();

            $sql = "SELECT value_name FROM key_value WHERE key_name=:key";

            $result = $db->prepare($sql);
            if( $result->execute(['key' => $key])){
                $data = $result->fetch(\PDO::FETCH_ASSOC);

                return $data['value_name'];
            }else{
                return NOT_EXIST;
            }
        }else{
            return NOT_EXIST;
        }

    }
    public function deleteData($key)
    {
        if($this->checkKey($key)){

            $db = $this->getConnect();

            $sql = "DELETE FROM key_value WHERE key_name=:key LIMIT 1";

            $result = $db->prepare($sql);

            $result->bindParam(':key', $key, PDO::PARAM_STR);
            return $result->execute();
        }else{
            return NOT_EXIST;
        }

    }

    private function checkKey($key)
    {
        $db = $this->getConnect();
        $stmt = $db->prepare('SELECT * FROM key_value WHERE key_name=?');
        $stmt->bindParam(1, $key, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$row)
        {
            return false ;
        }else{
            return true;
        }
    }

}
