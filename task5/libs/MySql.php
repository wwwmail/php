<?php

class MySql implements iWorkData
{

        private $dbh;

        private function getConnect()
        {
            
           
           try {
                  return new PDO("mysql:host=localhost;dbname=dev", 'dev', '1111' );
                  
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
                (:key_name, :value_name)
";

            $result = $db->prepare($sql);
            $result->bindParam(':key_name', $key, PDO::PARAM_STR);
            $result->bindParam(':value_name', $val, PDO::PARAM_STR);


            return $result->execute();



        }
        public function getData($key)
        {
          $db = $this->getConnect();


          $sql = "SELECT value_name FROM key_value WHERE key_name=:key";

            $result = $db->prepare($sql);
          if( $result->execute(['key' => $key])){
                return $result->fetch(\PDO::FETCH_ASSOC);
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
