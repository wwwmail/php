<?php

class Sql
{
    private $table;
    private $query;
    private $insertValue = [];   

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



    public function setTable( string $table)
    {
        
        $this->table = (string) $table;
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

            
        print $query;
            $this->setQuery($query);
            $this->setInsertValue($insertValues);
        
            
/*
        $statement = $link->prepare("INSERT INTO my_table(firstname, lastname, email)
        VALUES(?,?,?)");

        $statement->execute(array("Bill","Terry",'bill@mail.cz'));


 */


  
    }


    public function where(array $keyValue)
    {
            $str = '';
            $i = 0;
            // $fields = implode(', ', array_keys($keyValue));
            // $values = implode(', ', array_values($keyValue));     
            if(is_array($keyValue)){
                    foreach ($keyValue as $k=>$v){
                            $i++;
                            if($i == 0){

                                    $str .= "WHERE $k=$v ";
                            }else{
                                    $str .=" AND WHERE $k=$v";
                            }
                    }
            }
        print $str;
        $this->query .= $str; 
        return $this;
    }

    public function delete()
    {
    }

    public function update()
    {
    }


}
