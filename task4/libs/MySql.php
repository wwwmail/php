<?php

class MySql extends Sql
{   
    
    
    public function getConnect()
    {       
        try {
            return  new PDO('mysql:host='.$this->getHost().';dbname='.$this->getDb(), $this->getUser(), $this->getPass(),   array(PDO::ATTR_PERSISTENT=>true));
         
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}
