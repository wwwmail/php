<?php

class Sql
{
    private $table;



//   public function getConnect()
//   {
//
//           try {
//                   $dbh = new PDO('mysql:host=localhost;dbname=user1', 'user1', 'user1');
//
//                   return $dbh;
//           } catch (PDOException $e) {
//                   print "Error!: " . $e->getMessage() . "<br/>";
//                   die();
//           }
//   }
    public function select(array $selectFields, string $table )
    {
        
        $a = implode(', ', $selectFields);
       
        $query = "SELECT $a FROM $table";
        echo $query;
       //$stmt = $pdo->query('SELECT name FROM users');
    }

//    public function select()
//    {
//        
//    }
    
    public function setTable( string $table)
    {
        
        $this->table = (string) $table;
    }

    public function insert(array $selectFields, string $table )
    {
        "INSERT INTO users SET ".pdoSet($allowed,$values);
         $a = implode(', ', $selectFields);
       
        $query = "INSERT INTO $table SET ";
        echo $query;
    }

    public function delete()
    {
    }

    public function update()
    {
    }


}
