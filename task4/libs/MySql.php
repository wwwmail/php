<?php

class MySql extends Sql
{   
    private $host;
    private $dbName;
    private $userName;
    private $pass;
    
    public function setHost()
    {
        if(is_string($host) && !empty($host)){
                $this->host = $host;
        }else{
            return false;
        }
    }

    public function getConnect()
    {       
           try {
                   $dbh = new PDO('mysql:host=localhost;dbname=user1', 'user1', 'user1');
                   return $dbh;
           } catch (PDOException $e) {
                   print "Error!: " . $e->getMessage() . "<br/>";
                   die();
           }
  
    }
    public function select()
    {
    }

    public function insert()
    {
    }

    public function delete()
    {
    }

    public function update()
    {
    }
}
