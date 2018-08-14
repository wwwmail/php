<?php

class Search 
{   
    public function sendCurl($query)
    {

        $query = urlencode($query);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com.ua/search?q=$query&aqs=chrome..69i57j69i60l3j35i39l2.2081j0j7&sourceid=chrome&ie=UTF-8");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

        $data = curl_exec($ch);
        curl_close($ch);

        $data = iconv("windows-1251", "utf-8", $data);
        return $data;

    }


    public function getSearchData($query)
    {
        $array = array();
        $data  = $this->sendCurl($query);
        
        $document = phpQuery::newDocument($data);

        $hentry = $document->find('#search .g');

        $i = 0;
        foreach ($hentry as $el) {
            $pq = pq($el);
      
            $array[$i]['title'] =  $pq->find('.r a')->text();
      
            $array[$i]['url'] =  $pq->find('.s cite')->text();
   
            $array[$i]['description'] =  $pq->find('.s .st')->text();

            $i++;
        
        }

        return $array;

    }

}
