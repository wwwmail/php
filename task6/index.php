<?php
include ('libs/iBand.php');
include ('libs/iInstrument.php');
include ('libs/iMusician.php');
include ('libs/Band.php');
include ('libs/Instrument.php');
include ('libs/Musician.php');



$ins1 = new Instrument();

$ins1->setCategory('электро');
$ins1->setName('гитара');
$ins1->setName('барабаны');

$ins2 = new Instrument();

$ins2->setCategory('Натуральные ');
$ins2->setName('фанфара');
$ins2->setName('горн');

$ins3 = new Instrument();

$ins3->setCategory('Клапанные');
$ins3->setName('корнет');
$ins3->setName('серпент');


$mus1 = new Musician();








$band1 = new Band();

$band1->setName('dream');





var_dump($ins2);