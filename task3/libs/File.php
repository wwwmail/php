<?php

class File
{
    private $fileContent;
    

    public function setFileContent($file)
    {
        if (is_file($file)){
                $this->fileContent = file($file);
        }
    }

    public function getFileContent()
    {
        return $this->fileContent;
    }

    public function getStringFromFile($numString)
    {
        if(array_key_exists((int)$numString)){
            return $this->fileContet[$numString];
        }else{
            return 'Sorry this file didn\'t has the number of string';
        }     
    }
    

}
