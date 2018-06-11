<?php
include ('libs/Sql.php');
include ('libs/MySql.php');
include ('libs/PostgreSql.php');


$obj = new PostgreSql();

//$a = $obj->getConnect();

$obj->select(['name', 'desk'], 'users');


