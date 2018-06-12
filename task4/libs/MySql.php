<?php

class MySql extends Sql
{   


    public function getConnect()
    {       
        try {
            $dbh = new PDO('mysql:host='.$this->host.';dbname=user4', 'user4', 'user4');
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

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

            if($sth->execute($this->getUpdateValue())){

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
    

       // print($this->getQuery());
        $sth = $dbh->prepare($this->getQuery()); 

        if( $sth->execute()){
            return  $sth->execute(); 
        }else{
            return false;
        } 
       
    }


}
