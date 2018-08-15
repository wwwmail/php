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

    public function select(array $selectFields)
    {

      if(empty($selectFields)){
            throw new SqlException(EMPTY_SELECT);
       }
        $fields = implode(', ', $selectFields);

        $query = "SELECT $fields ";

        $this->setQuery($query);

        return $this;    
    }
    
    public function distinct()
    {
        $this->query = str_replace('SELECT', 'SELECT DISTINCT ', $this->query);
        return $this;
    }

    public function from($from)
    {

      if(empty($from)){
            throw new SqlException(EMPTY_FROM);
       }
        $from = " FROM $from";
        $this->query .= $from;
        return $this;
    }


    public function limit($limit)
    {

      if(empty($limit)){
            throw new SqlException(EMPTY_LIMIT);
       }
        $limit = (int) $limit;
        $limit = " LIMIT $limit ";
        $this->query .= $limit;  
        return $this;
    }
    
    public function group($param)
    {
        if(empty($param)){
            throw new SqlException(EMPTY_GROUP);
        }
        
        $this->query.=" GROUP BY $param ";
        return $this;
    }
    
    public function having($condition)
    {
        if(empty($condition)){
            throw new SqlException(EMPTY_HAVING);
        }
        
        $this->query.=" HAVING $condition ";
        return $this;
    }
    
    public function orderBy($array, $condition)
    {
        if(empty($array)){
            throw new SqlException(EMPTY_ORDER);
        }elseif (empty ($condition)) {
             throw new SqlException(EMPTY_ORDER_CONDITION);   
        }
        
        $condition = strtoupper ($condition);
        
        if($condition != 'ASC' || $condition !='DESC'){
            $condition = 'ASC';
        }
        
        if(is_array($array)){
            $arrayToString = implode(",", $array);
        } else {
            $arrayToString = $array;
        }
        $this->query.= " ORDER BY $arrayToString $condition";
        return $this;
    }
    
    



    public function insert(array $insertData,  $table )
    {

        $insertFields = array_keys($insertData);

        $insertValues = array_values($insertData);
        
        if(empty($insertFields) || empty($insertValues)){
            throw new SqlException(EMPTY_INSERT);
        }

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


    public function where( $key, $param, $val )
    {
        if(empty($key) || empty($param) || empty($val)){
            throw new SqlException(EMPTY_WHERE);
        }
     
        $str  = " WHERE $key $param '$val' "; 
        $this->query .= $str;   
        return $this;
    }

    public function andWhere( $key, $param, $val )
    {

        if(empty($key) || empty($param) || empty($val)){
            throw new SqlException(EMPTY_WHERE);
        }
  
        $str  = " AND $key $param '$val' "; 
        $this->query .= $str; 
        return $this;
    }



    public function join($table, $condition1, $condition2)
    {
        if(empty($table)){
            throw new SqlException(EMPTY_JOIN_TABLE);
        }
         
        if(empty($condition1) || empty($condition2)){
             throw new SqlException(EMPTY_JOIN_CONDITION);
        }
         
        $this->query .= " INNER JOIN ".$table." ON $condition1 = $condition2 ";
        return $this;
    }

    public function leftJoin($table, $condition1, $condition2)
    {
        if(empty($table)){
            throw new SqlException(EMPTY_JOIN_TABLE);
        }
         
        if(empty($condition1) || empty($condition2)){
             throw new SqlException(EMPTY_JOIN_CONDITION);
        }
        
        $this->query .= " LEFT OUTER JOIN $table ON $condition1 = $condition2 ";
        return $this;
    }

    public function rightJoin($table, $condition1, $condition2)
    {
        if(empty($table)){
            throw new SqlException(EMPTY_JOIN_TABLE);
        }
         
        if(empty($condition1) || empty($condition2)){
             throw new SqlException(EMPTY_JOIN_CONDITION);
        }
        
        $this->query .= " RIGHT OUTER JOIN $table ON $condition1 = $condition2 ";
        return $this;
    }


    public function crossJoin($table, $condition1, $condition2)
    {
        if(empty($table)){
            throw new SqlException(EMPTY_JOIN_TABLE);
        }
         
        if(empty($condition1) || empty($condition2)){
             throw new SqlException(EMPTY_JOIN_CONDITION);
        }
        
        $this->query .= " CROSS JOIN $table ON $condition1 = $condition2 ";
        return $this;
    }

    
    public function naturalJoin($table, $condition1, $condition2)
    {
        if(empty($table)){
            throw new SqlException(EMPTY_JOIN_TABLE);
        }
         
        if(empty($condition1) || empty($condition2)){
             throw new SqlException(EMPTY_JOIN_CONDITION);
        }
        
        $this->query .= " NATURAL JOIN $table ON $condition1 = $condition2 ";
        return $this;
    }


    public function delete()
    {

        $str = "DELETE ";// FROM $fromTable";
        $this->query = $str;
        return $this;
    }

    public function update( array $updateData, $table)
    {

        $updateFields = array_keys($updateData);

        $updateValues = array_values($updateData);

        if(empty($updateFields) || empty($updateValues)){
            throw new SqlException(EMPTY_UPDATE);
        }

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

        $this->updateValue = $updateData;            
        $this->query = $str;
        return $this;
    }
    

    public function execInsert()
    {
        $dbh = $this->getConnect();

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbh->prepare($this->getQuery());

        if(count($this->getInsertValue())>0){

            if($sth->execute($this->getInsertValue())){

                return true;

            }else{
                return false;
            }

        }else{
            return false;

        } 

    }

    public function execSelect()
    {

        $dbh = $this->getConnect();

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo $this->getQuery(); die;
        $sth = $dbh->prepare($this->getQuery()); 

        if( $sth->execute()){
            return  $sth->fetchAll(\PDO::FETCH_ASSOC); 
        }else{
            return false;
        } 
    }


    public function execUpdate()
    {
        $dbh = $this->getConnect(); 

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbh->prepare($this->getQuery());

        if(count($this->getUpdateValue())>0){

           // var_dump($this->getUpdateValue()); die;
            $i = 1;
            foreach ($this->getUpdateValue() as $value) {
                $sth->bindParam($i, $value, PDO::PARAM_STR);
                //   $sth->bindValue(':' . $name, $value, PDO::PARAM_STR);
              //  echo $name; echo '<br>'; echo $value; echo '<br>';
                $i++;
            }
          //  die;

            if($sth->execute()){

                return true;

            }else{
                return false;
            }

        }else{
            return false;

        } 

    }


    public function execDelete()
    {
      
        $dbh = $this->getConnect();

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $sth = $dbh->prepare($this->getQuery()); 

        if( $sth->execute()){
            return  $sth->execute(); 
        }else{
            return false;
        } 
       
    }
}
