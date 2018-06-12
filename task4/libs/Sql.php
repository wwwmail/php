<?php

class Sql
{
    private $table;
    private $query;
    private $insertValue = [];   
    private $updateValue = [];

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
        $this->insertValue = array($insVal);  
    }

    public function setUpdateValue(array $updVal)
    {
        $this->$updateValue = $updVal;
    }
    
    public function getInsertValue()
    {
        return $this->insertValue;
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
            $limit = "LIMIT $limit";
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

            
 //       print $query;
            $this->setQuery($query);
            $this->setInsertValue($insertValues);
        
            
/*
        $statement = $link->prepare("INSERT INTO my_table(firstname, lastname, email)
        VALUES(?,?,?)");

        $statement->execute(array("Bill","Terry",'bill@mail.cz'));


 */


  
    }


    public function where( $key, $val, $param = '=' )
    {
            $str = '';
         $str  = "WHERE $key$param$val "; 
            $this->query .= $str; 
        return $this;
    }

    public function andWhere( $key, $val, $param = '=' )
    {
            $str = '';
         $str  = "AND WHERE $key$param$val "; 
       $this->query .= $str; 
        return $this;
    }

    public function delete($fromTable)
    {
            
            $str = "DELETE FROM $fromTable";
            $this->query = $str;
    }

    public function update( $updateData, $table)
    {
            $updateFields = array_keys($updateData);

    
        $updateValues = array_values($updateData);
           
            $fields = implode(', ', $updateFields);

            $i = 0;
            $str = '';

            $str = "UPDATE $table SET ";
            while (count($updateFields) > $i) {
                    
                    if($i < count($updateData)-1) { 
                            $str .= $updateFields[$i]. '=?, ';
                    }else{
                            $str.=$updateFields[$i]. '=?';
                    }
                  $i++; 
         
            }

$this->            
echo $str; /*            
            $str = "";
            $sql = "UPDATE users SET name=?, surname=?, sex=? WHERE id=?";
            $stmt= $dpo->prepare($sql);
            $stmt->execute([$name, $surname, $sex]);
            or you can chain execute() to prepare():

                    $sql = "UPDATE users SET name=?, surname=?, sex=? WHERE id=?";
            $dpo->prepare($sql)->execute([$name, $surname, $sex, $id]);
            UPDATE query with named placeholdreds
                    In case you have a predefined array with values, or prefer named placeholders in general, the code would be

                    $data = [
                            'name' => $name,
                            'surname' => $surname,
                            'sex' => $sex,
                            'id' => $id,
                    ];
            $sql = "UPDATE users SET name=:name, surname=:surname, sex=:sex WHERE id=:id";
            $stmt= $dpo->prepare($sql);
            $stmt->execute($data);*/
    }


}
