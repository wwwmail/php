<?php

class PostgreSql extends Sql
{

    public function getConnect()
    {       
        try {
            return  new PDO('pgsql:host='.$this->getHost().';dbname='.$this->getDb(), $this->getUser(), $this->getPass());
         
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}
