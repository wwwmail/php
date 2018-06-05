<?php

class Calculator
{
    private $memory;
    private $a;
    private $b;
    


   /* public function __construct($a, $b, $operations)
    {
        if($this->validate($a) && $this->validate($b)){
                    
        }
    
    }*/

    public setA($a)
    {
        if(is_int($a)){
            return $this->a = (int)$a;
        }else{
            return false;
        } 
    }

    public setB($b)
    {
        if(is_int($b)){
            return $this->b = (int)$b;
        }else{
            return false;
        } 
    }

    public getA()
    {
       return $this->a;
    }

    public getB()
    {
        return $this->b;
    }


    public function calculate($operation, $a, $b = 0)
    {
            if($this->checkMethod($operation)){

                    switch ($operation):
                    case 'evolution':
                            if($this->validate($a)){
                                    return $operation . " " . $a . " = ". $this->$operation($a); 
                            }else{
                                return ERROR_INT;
                            }
                            break;
                    case 'devision':
                            if($this->validate($a) && $this->validate($b) && $b != 0){
                                    return $a . " " . $operation . " " . $b . " = ". $this->$operation($a, $b); 
                            }else{
                                return ERROR_INT;
                            }  
                            break;
                   default:
                                   
                   
                            if($this->validate($a) && $this->validate($b)){
                                    return $a ." ". $operation . " $b = " .  $this->$operation($a, $b);
                            }else{
                                return ERROR_INT;
                            }
                    endswitch;
            }else{
                    return ERROR_OPERATION;
            }
    }


    function checkMethod($method)
    {
        return method_exists($this, $method);
    }

    public function setMemory($number)
    {
        return $this->memory = $number;
    }

    public function getMemory()
    {
        return $this->memory;
    }
    
    private function validate($number)
    {
        if(is_int($number)){
            return true;
        }else{
            return false;
        }
    }
    public function addition($a, $b)
    {
       # if($this->validate
        return $a + $b;
    }

    public function subtraction($a, $b)
    {
        return $a - $b;
    }

    public function multiplication($a, $b)
    {
        return $a * $b;
    }

    public function division($a, $b)
    {
        return $a / $b;
    }
    
    public function involution($a, $b)
    {
        return $a**$b;
    }


    public function evolution($a)
    {
        return sqrt($a);
    }

    public function memory($number)
    {
       return    
    }



}
