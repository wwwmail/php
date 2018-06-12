<?php

class MySql extends Sql
{   
    private $host;
    private $dbName;
    private $userName;
    private $pass;



    public function getConnect()
    {       
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=user4', 'user4', 'user4');
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

        //var_dump($dbh); die;
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //    echo $this->getQuery(); die;
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

          /*  $sql = "UPDATE users SET name=?, surname=?, sex=? WHERE id=?";

            $stmt= $dpo->prepare($sql);
            $stmt->execute([$name, $surname, $sex]);
           */
    }


    public function insert2()
    {
    }

    public function delete2()
    {
    }

    public function update2()
    {
    }
    public function __destruct() {

    }
}
