<?php

class Instrument implements iInstrument
{
    private $name;
    
    private $category;
    
    


    public function setName($name)
    {
        $this->name[] = $name;
    }

    public function getName()
    {
        return implode (', ', $this->name);
       // return $this->name;
    }
     
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
}
