<?php
include ('libs/Sql.php');
include ('libs/MySql.php');
include ('libs/PostgreSql.php');

/*

$obj = new MYSql();

$obj->setHost('localhost');
$obj->setDb('user4');
$obj->setUser('user4');
$obj->setPass('user4');
*/


/*
$c = $obj->insert(['firstname'=>'Ivan','email'=>'qq@mail.cz','lastname'=>'Yasinskiy'],'my_table')->end();
 */

/*
 *
 *
$d  = $obj->update(['firstname'=>'Lamps','email'=>'qq@mail.cz','lastname'=>'Yasinskiy'],'my_table')
        ->where('id', '5', '<')
        ->andWhere('id','3','>')
        ->execUpdate();
 */

/*
$g = $obj->delete('my_table')->where('id', '3', '=')->execDelete();
var_dump($g);
*/
/*
$b = $obj->select(['firstname', 'email'], 'my_table')
        //->limit(2)
        ->end();


var_dump($b);
 */
/*
$obj->insert(['tilte'     =>'Bob',
              'firstname' =>'Lampard',
              'email'     => 'bob@mail.com'], 'some_table');


 */

/*
        $obj->where('title','Bob', '=')->andWhere('id','10','<');
 */
/*
$obj->update(['tilte'     =>'Bob',
              'firstname' =>'Lampard',
              'email'     => 'bob@mail.com'], 'some_table');
*/

$obj2 = new PostgreSql();

$obj2->setHost('localhost');
$obj2->setDb('user1');
$obj2->setUser('user1');
$obj2->setPass('user1');




$c = $obj2->insert(['userid'=>'user4','userdata'=>'new data22'],'pg_test')->execInsert();

$array = $obj2->select(['userid','userdata'])->where('userid','user4', '=')->limit(2);

var_dump($c);


include ('temlate/index.php');

