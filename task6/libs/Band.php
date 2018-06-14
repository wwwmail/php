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
        return implode (', ', $this->genre); 
    }
    
    
    public function addMusician(iMusician $obj)
    {
        $this->musicants[]= $obj;
    }
    
    public function getMusician()
    {
        $str = '';
        foreach ($this->musicants as $item){

            $str .= $item->getMusicianType();
            $str .= ', ';

        }
        return substr($str, 0, -1);
    }


    public function getInstruments()
    {

        $str = '';
        
        foreach ($this->musicants as $item){
            $str .= $item->getInstrument();

            $str .= ', ';
        }
        return substr($str, 0, -2); 
    }
}
