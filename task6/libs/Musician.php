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
        $arr = array();

        foreach ($this->instruments as $val){

            $arr[] = $val->getName();
        }

        $arr = array_unique($arr);

        return implode(', ', $arr);

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
