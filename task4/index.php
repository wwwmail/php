<?php
include ('config.php');
include ('libs/SqlException.php');
include ('libs/Sql.php');
include ('libs/MySql.php');
include ('libs/PostgreSql.php');




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
$obj3->setDb('user1');
$obj3->setUser('user1');
$obj3->setPass('user1');


$c3 = $obj3->insert( ['userid'=>'user4','userdata'=>'dev dev'], 'MY_TEST')->execInsert();

/*
$obj3->delete()
    ->from('MY_TEST')
    ->where('userid','=', 'user4')
    ->limit(1)
    ->execDelete();
 */
$array3 = $obj3->select(['userid','userdata'])
              ->from( 'MY_TEST')
              ->where('userid', '=', 'user4')
//              ->limit(2)
              ->execSelect();



//$c = $obj2->insert( ['userid'=>'user4','userdata'=>date('m')], 'pg_test')->execInsert();

include ('template/index.php');


} catch(SqlException $e){

echo $e->getMessage();
}

