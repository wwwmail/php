<?php

class MySql implements iWorkData
{

        private $dbh;

        private function getConnect()
        {
            
           
           try {
                  return new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASS );
                  
           } catch (PDOException $e) {
                   print "Error!: you dont have access to DataBase";
                   die();
           }
  
     
        
        } 
        public function saveData($key, $val)
        {





                $db = $this->getConnect();

                $sql = "INSERT INTO `key_value` 
                        (key_name, value_name)
                        VALUES
                        (:key_name, :value_name,)
                        ";

                $result = $db->prepare($sql);
                $result->bindParam(':key_name', $key, PDO::PARAM_STR);
                $result->bindParam(':value_name', $val, PDO::PARAM_STR);
                

                return $result->execute();




            return 1;

              var_dump(  $this->dbh = $this->getConnect());
                
                $stmt = $this->dbh->prepare("INSERT INTO `key_value` (key_name, value_name) VALUES (:key_name, :value_name)");
                $stmt->bindParam(':key_name', $key, PDO::PARAM_STR);
                $stmt->bindParam(':value_name', $val, PDO::PARAM_STR);
                    
                return $stmt->execute();
               /* if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }*/
             
        }
        public function getData($key)
        {
                if(isset($_COOKIE[$key])){
                    return $_COOKIE[$key];
                }else{
                    return NOT_EXIST;
                }
        }
        public function deleteData($key)
        {
            if(isset($_COOKIE[$key])){
                   unset($_COOKIE[$key]);     
               return setcookie($key, '', time() - 3600);
            }else{
                return NOT_EXIST;
            }
        }

}
