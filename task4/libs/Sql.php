<?php

class Sql
{
   protected $connect;


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
    public function test()
    {
    
        echo 'test from SQl';
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
