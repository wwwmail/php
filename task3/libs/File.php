<?php 

class File 
{

        private $fileContent;

        public function setFileContent(string $filePath)
        {
                if(file_exists($filePath)){
                    $this->fileContent = file($filePath);
                }
        }
        
        public function getFileContent()
        {
            return $this->fileContent;
        }
        
        
        private function checkNum(int $num)
        {
            if(is_int($num) && $num > 0){
                return true;
            }else{
                return false;
            }
        }
        
        
        private function isExistString(int $numStr)
        {
            if($this->checkNum($numStr)){
                if(array_key_exists($numStr-1, $this->fileContent)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
         




        public function  getStringFromFile(int $numStr)
        {
            if($this->isExistString($numStr)){
                return $this->fileContent[$numStr-1];
            } else {
                return "error, string not found";
            }
            
        }
        
        private function isExistSymbol(int $numStr, int $numSym)
        {
            if($this->checkNum($numSym)){
                if($this->isExistString($numStr) ){
                    if(isset($this->fileContent[$numSym])){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
        public function getSymbolFromFile(int $numStr, int $numSym)
        {
            if($this->isExistSymbol($numStr, $numSym)){
                $string = $this->getStringFromFile($numStr);
                return $string[$numSym-1];
            }else{
                return "symbol not exist";
            }
        }
        
        
        public function replaceString(int $numStr, string $str)
        {
            if($this->isExistString($numStr)){
                $this->fileContent[$numStr] = $str;
                return true;
            }else{
                return "string not found";
            }
        }
        
        public function replaceSymbol(int $numStr, int $numSym, string $symbol)
        {
            if($this->isExistSymbol($numStr, $numSym)){
                $this->fileContent[$numStr-1][$numSym-1] = $symbol;
              
                return true;
            }else{
                return "symbol not exist";   
            }
        }
        
    public function printFile(string $filePath)
    {
        if(file_exists($filePath)){
            foreach ($this->fileContent as $string){
                for($i=0; $i < iconv_strlen($string); $i++){
                    echo $string[$i];
                }
            }
            return true;
        }else{
            return 'file not found';
        }
    }
    
    
    public function printContent()
    {
        foreach ($this->fileContent as $string){
            for($i=0; $i < iconv_strlen($string); $i++){
                echo $string[$i];
            }
        }        
    }
    
    
    private function checkPermFolder(string $dirPath)
    {
         if(substr(sprintf('%o', fileperms($dirPath)), -4) == '0777'){

                return true;
        }else{
                return PERMISSION_DIR;
        }
    }

    public function saveChanges(string $dirPath, string $fileName)
    {
        if($this->checkPermFolder($dirPath)){
            $fileString = implode("", $this->fileContent);
            $fp = fopen($dirPath.'/'.$fileName, 'w+');
            fwrite($fp, $fileString);
            fclose($fp);
            chmod($filePath, 0777);
        }else{
            return false;
        }
}
        

        
        
        
}
