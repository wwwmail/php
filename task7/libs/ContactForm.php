<?php


class ContactForm extends Post
{
    private $name;
    private $email;
    private $subject;
    private $message;
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


    public function validateMessage($message)
    {
        if(strlen($message)< 5){
            return 'Message must consist from 2 letter';
        }else{
            return true;
        }
    }
    
    public function validateSubject($subject)
    {
        if(empty($subject)){
            return 'subject must be not empty';
        }else{
            return true;
        }
    }
    
    
    public function validateEmail()
    {
        if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return "wrong email";
        }
    }

    public function setProperties(array $array)
    {
        $this->setArrayOfData($array);
        
        $this->name = $this->getArrayOfData()['name'];
        $this->email = $this->getArrayOfData()['email'];
        
        $this->subject = $this->getArrayOfData()['subject'];
        $this->ipAddres = $this->getArrayOfData()['ipAddres'];
        $this->clietTime = $this->getArrayOfData()['clietTime'];
        $this->message = $this->getArrayOfData()['message'];

          
    }
    
    
    public function validateForm(array $post)
    {
        $this->setProperties($post);
        
        
        if()
        
        
    }
    
    
    






}
