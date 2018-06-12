<?php

class Sql
{
    private $table;
    private $query;
    private $insertValue = [];   
    private $updateValue = [];
   
    private $host;
    private $dbName;
    private $userName;
    private $pass;

   
   
    public function setHost($host)
    {
        $this->host = $host;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setDb($dbName)
    {
        $this->dbName = $dbName;
    }

    public function getDb()
    {
        return $this->dbName;
    }

    public function setUser($user)
    {
        $this->userName = $user;
    }
    
    public function getUser()
    {
        return $this->userName;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getPass()
    {
        return $this->pass;
    }


    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setInsertValue(array $insVal)
    {
        $this->insertValue = (array)$insVal;  
    }


    public function getInsertValue()
    {
        return $this->insertValue;
    }


    public function setUpdateValue( array $array)
    {
        $this->updateValue = (array) $array;
    }

    public function getUpdateValue()
    {
        return $this->updateValue;
    }

    public function select(array $selectFields, $table )
    {

        $fields = implode(', ', $selectFields);

        $query = "SELECT $fields FROM $table";

        $this->setQuery($query);

        return $this;    
    }


    public function limit($limit)
    {
        $limit = (int) $limit;
        $limit = " LIMIT $limit";
        $this->query .= $limit;  
        return $this;
    }



    public function insert(array $insertData,  $table )
    {

        $insertFields = array_keys($insertData);

        $insertValues = array_values($insertData);

        $fields = implode(', ', $insertFields);

        $i = 0;

        $str = '';

        while (count($insertFields) > $i) {
            $i++;
            if($i < count($insertFields)) { 
                $str .= '?, ';
            }else{
                $str.='?';
            }     
        }

        $query = "INSERT INTO $table($fields) VALUES ($str)";

        $this->setQuery($query);
        $this->setInsertValue($insertValues);

        return $this;    


    }


    public function where( $key, $val, $param = '=' )
    {
        $str  = " WHERE $key $param $val "; 
        $this->query .= $str; 
        return $this;
    }

    public function andWhere( $key, $val, $param = '=' )
    {
  
        $str  = " AND $key $param $val "; 
        $this->query .= $str; 
        return $this;
    }

    public function delete($fromTable)
    {

        $str = "DELETE FROM $fromTable";
        $this->query = $str;
        return $this;
    }

    public function update( array $updateData, $table)
    {

        $updateFields = array_keys($updateData);

        $updateValues = array_values($updateData);

        $fields = implode(', ', $updateFields);

        $i = 0;
 
        $str = "UPDATE $table SET ";
        while (count($updateFields) > $i) {

            if($i < count($updateData)-1) { 
                $str .= $updateFields[$i]. '=?, ';
            }else{
                $str.=$updateFields[$i]. '=?';
            }
            $i++; 

        }

        $this->updateValue = $updateValues;            
        $this->query = $str;
        return $this;
    }


}
