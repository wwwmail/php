<?php
ini_set('memory_limit', '-1');
include ('config.php');
include ('libs/SqlException.php');
include ('libs/Sql.php');
include ('libs/MySql.php');
include ('libs/PostgreSql.php');

/*


$z = 0;
for($k=1; $k<=10; $k++){
    
    for($i=1; $i<=10; $i++){
       $z++; 
        echo $z;
        echo "<br>";
    }


}

die;

*/

/*


 function getConnect()
    {       
        try {
            return  new PDO('pgsql:host=localhost;dbname=user4', 'user4', 'user4',   array(PDO::ATTR_PERSISTENT=>true));
         
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

$z = 0;
for($k=1; $k<=1000; $k++){
    echo $k; 
    echo '<br>';
$str1 ='INSERT INTO test_pg (id, name, descr) VALUES ';

$val = '';


//for($k=3; $k<5; $k++){

for($i=1; $i<=1000; $i++){

$z++;
    $str = substr( 'ssomeusersomeusersomeuser'.$z ,strlen($z));

    $name = $str.$str.$str.$str.$str;

    $descr = $name.$name.$name.$name.$name;
    

    $coma = '';

    if($i<1000){
    $coma = ', ';
    }

    $val .= "('".$z."', '".$name."','".$descr."')".$coma;
   // $c3 = $obj3->insert(['id'=>$i, 'name'=>$name, 'descr'=>$descr] , 'test_mysql')->execInsert();
}

//echo $val; 
$con = getConnect();


$sql = $str1.$val;

//echo $sql; die;

    $con->query($sql);
}

//var_dump($con);























die;

*/
try{


$obj2 = new PostgreSql();

$obj2->setHost('localhost');
$obj2->setDb('user1');
$obj2->setUser('user1');
$obj2->setPass('user1');

$a = '';

$d = $obj2->update(['userdata'=>date('s')],'pg_test')
          ->where('userid', '=', 'user4')
          ->execUpdate();
$array2 = $obj2->select(['userid','userdata'])
              ->from( 'PG_TEST')
              ->where('userid', '=', 'user4')
              ->limit(2)
              ->execSelect();



//$c = $obj2->insert( ['userid'=>'user4','userdata'=>'new data22'], 'pg_test')->execInsert();


$obj3 = new MySql();

$obj3->setHost('localhost');
$obj3->setDb('user4');
$obj3->setUser('user4');
$obj3->setPass('user4');


$c3 = $obj3->insert( ['userid'=>'user4','userdata'=>'dev dev'], 'MY_TEST')->execInsert();


/*
$obj3->delete()
    ->from('MY_TEST')
    ->where('userid','=', 'user4')
    ->limit(1)
    ->execDelete();
 */

/*
$array3 = $obj3->select(['userid','userdata'])
              ->from( 'MY_TEST')
              ->where('userid', '=', 'user4')
              ->limit(2)
              ->execSelect();

 */

//$c = $obj2->insert( ['userid'=>'user4','userdata'=>date('m')], 'pg_test')->execInsert();

include ('template/index.php');


} catch(SqlException $e){

echo $e->getMessage();
}

