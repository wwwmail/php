<?php


class ContactForm extends Post
{
    private $name;
    private $email;
    private $subject;
    private $ipAddres;
    private $clietTime;
    
    
    
    public function checkData(string $field)
    {   
            if(!empty($field)){
                    return true;
              //  return $field = trip_tags(trim($field));
            }else{
                return 'empty field';
            }
    
    }


    public function setProperties()
    {
        
    }

    public function validateName($name)
    {
        if($this->checkData) 
    }
    public function setProperties(array $array)
    {
            $this->setArrayOfData($array);
            
            return [
            'name' => getArrayOfData
            
            
            ]
            $this->getArrayOfData();

                   
    }






}
