<?php 

class File 
{

        private $fileContent;

        public function setFileContent($filePath)
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
                return STR_ERROR;
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
                return SYMBOL_ERROR;
            }
        }
        
        
        public function replaceString(int $numStr, string $str)
        {
            if($this->isExistString($numStr)){
                $this->fileContent[$numStr] = $str;
                return true;
            }else{
                return STR_ERROR;
            }
        }
        
        public function replaceSymbol(int $numStr, int $numSym, string $symbol)
        {
                if($this->isExistSymbol($numStr, $numSym)){
                        if(!empty($symbol)){
                                $this->fileContent[$numStr-1][$numSym-1] =  $symbol;
                                return $symbol;
                        }else{
                            return EMPTY_VALUE;         
                        }
               
            }else{
                return SYMBOL_ERROR;   
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
            return FILE_ERROR;
        }
    }
    
    
    public function printContent()
    {
       $file='';
        foreach ($this->fileContent as $string){
            for($i=0; $i < iconv_strlen($string); $i++){
                $file.= $string[$i];
            }
        }
       return $file;       
    }
    
    
    private function checkPermFolder(string $dirPath)
    {
         if(substr(sprintf('%o', fileperms($dirPath)), -4) == '0777'){

                return true;
        }else{
                return false;
        }
    }

    public function saveChanges(string $dirPath, string $fileName)
    {
        if($this->checkPermFolder($dirPath)){
            $fileString = implode("", $this->fileContent);
            $fp = fopen($dirPath.'/'.$fileName, 'w+');
            fwrite($fp, $fileString);
            fclose($fp);
            chmod("$dirPath/$fileName", 0777);
            return SUCCESS_SAVE;
        }else{
            return  PERMISSION_DIR;
        }
    }
        

        
        
        
}
