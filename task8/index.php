<?php
/*
header('Content-type: text/html; charset=UTF-8');
header('Content-Type","application/x-www-form-urlencoded;charset=utf-8');
 */
include ('libs/phpQuery.php');
include ('libs/Search.php');


$data = array();
$search = '';
if(isset($_POST['search'])){
    
    $search = $_POST['search'];
    $obj = new Search(); 

    $data =  $obj->getSearchData($search);

}


include ('templates/index.php');



die;
/*


function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}




$url = 'https://www.google.com.ua/search?q=php&oq=php&aqs=chrome..69i57j69i60l3j35i39l2.2081j0j7&sourceid=chrome&ie=UTF-8';








$obj = new Search();

$obj->setUrl($url);



//echo $obj->_url; die;
$obj->getSearchData('php vs python');

die;

$data = file_get_contents_curl($url);

//$data = utf8_decode($data);
//var_dump($data);



















$habrablog = $data;

$document = phpQuery::newDocument($habrablog);

$hentry = $document->find('.r');


//var_dump($hentry);die;

foreach ($hentry as $el) {
    $pq = pq($el);
    echo "<br>";
  echo   $pq->find('a')->text();
 //  $pq->find('div.entry-info')->remove();  
 //   $tags->append(': ')->prepend(' :');

}

echo $hentry;












die;

 */
include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






