<?php
include ('libs/Sql.php');
include ('libs/MySql.php');
include ('libs/PostgreSql.php');


$dbhost = "localhost";
$dbname = "user4";
$dbusername = "user4";
$dbpassword = "user4";
/*
$link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $link->prepare("INSERT INTO my_table(firstname, lastname, email)
        VALUES(?,?,?)");

$statement->execute(array("Bill","Terry",'bill@mail.cz'));
 */


$obj = new MYSql();
/*
$a = $obj->getConnect();
var_dump($a);
$obj->select(['name', 'desk'], 'users');

 */
/*
$obj->insert(['tilte'     =>'Bob',
              'firstname' =>'Lampard',
              'email'     => 'bob@mail.com'], 'some_table');


 */

/*
        $obj->where('title','Bob', '=')->andWhere('id','10','<');
 */

$obj->update(['tilte'     =>'Bob',
              'firstname' =>'Lampard',
              'email'     => 'bob@mail.com'], 'some_table');



