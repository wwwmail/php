<?php

class Calculator
{
    private $memory;
    private $a;
    private $b;
    
   

    public function setA($a)
    {
       
       $this->a = (int)$a; 
    
    }

    public function setB($b)
    {
       
        $this->b = (int)$b;
        
    }

    public function getA()
    {
       return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }



    public function setMemory($number)
    {
        return $this->memory += $number;
    }

    public function getMemory()
    {
        return $this->memory;
    }
    
    public function resetMemory()
    {
        $this->memory -= $this->memory;
    }
    public function addition()
    {
       
        return $this->a + $this->b;
    }

    public function subtraction()
    {
        return $this->a - $this->b;
    }

    public function multiplication()
    {
        return $this->a * $this->b;
    }

    public function division()
    {
            if($this->b != 0){
                return $this->a / $this->b;
            }else{
                return ERROR_DIVISION;
            }
       
    }
    
    public function involution()
    {
        return $this->a**$this->b;
    }


    public function evolution()
    {
        return sqrt($this->a);
    }

    public function memory($number)
    {
       return;    
    }



}
