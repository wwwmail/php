<?php

class Band implements iBand
{
    private $name;
    private $genre;
    private $musicants;
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setGenre($genre)
    {
        $this->genre[] = $genre;
    }
    

    public function getGenre()
    {
        return implode (', ', $this->musicants);
       // return $this->genre;
    }
    
    
    public function addMusician(iMusician $obj)
    {
        $this->musicants[]= $obj;
    }
    
    public function getMusician()
    {
       return implode (', ', $this->musicants);
    }
}
