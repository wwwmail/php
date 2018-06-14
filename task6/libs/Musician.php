<?php

class Musician implements iMusician
{
    private $instruments;
    
    private $type;
    
    private $band;
    
    public function addInstrument(iInstrument $obj)
    {
        $this->instruments[] = $obj;
    }
    
    public function getInstrument()
    {


        $str = '';
        foreach ($this->instruments as $val){
        
            $str .= $val->getName();
            $str.=',';
        }
        return substr($str, 0, -1);

 
//      return $this->instruments;
    }
    
    public function assingToBand(iBand $nameBand)
    {
        $this->band = $nameBand;
    }
    
    
    public function setMusicianType($type)
    {
        $this->type = $type;
    }

    public function getMusicianType()
    {
        return $this->type;
    }
}
