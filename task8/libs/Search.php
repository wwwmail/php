<?php

class Search 
{

    private $_url;

    public function setUrl($url)
    {
        $this->_url = $url;
    }

    public function getUrl()
    {
        return $this->_url;
    }
    
    public function sendCurl($query)
    {

        $query = urlencode($query);

//        echo $query; die;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com.ua/search?q=$query&aqs=chrome..69i57j69i60l3j35i39l2.2081j0j7&sourceid=chrome&ie=UTF-8");


;
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

        $data = curl_exec($ch);
        curl_close($ch);
            
      //  var_dump($data); die;
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
      
            $array[$i]['title'] = $pq->find('.r a')->text();
      
            $array[$i]['url'] =  $pq->find('.s cite')->text();
   
            $array[$i]['description'] =  $pq->find('.s .st')->text();

            $i++;
        }

        var_dump($array);

        return $array;
    }

}
