<?php
include ('libs/config.php');
include ('libs/iBand.php');
include ('libs/iInstrument.php');
include ('libs/iMusician.php');
include ('libs/Band.php');
include ('libs/Instrument.php');
include ('libs/Musician.php');


$ins1 = new Instrument();

$ins1->setCategory('strunnie');
$ins1->setName('arfa');
$ins1->setName('skripka');

$ins2 = new Instrument();

$ins2->setCategory('duhovie');
$ins2->setName('trombon');
$ins2->setName('dudka');

$ins3 = new Instrument();

$ins3->setCategory('udarnie');
$ins3->setName('baraban');
$ins3->setName('bubni');


$mus1 = new Musician();

$mus1->setMusicianType('rocker');
$mus1->addInstrument($ins1);
$mus1->addInstrument($ins3);


$mus2 = new Musician();
$mus2->setMusicianType('poper');
$mus2->addInstrument($ins2);



$mus3 = new Musician();
$mus3->setMusicianType('jazzer');
$mus3->addInstrument($ins3);

$mus4 = new Musician();
$mus4->setMusicianType('classicer');
$mus4->addInstrument($ins1);
$mus4->addInstrument($ins2);
$mus4->addInstrument($ins3);



$band1 = new Band();

$band1->setName('DreamTeam');
$band1->addMusician($mus1);
$band1->addMusician($mus2);



$band2 = new Band();
$band2-> setName('beatELSE');
$band2->addMusician($mus3);
$band2->addMusician($mus4);

$band3 = new Band();
$band3->setName('QuestQuen');
$band3->setGenre('rock');
$band3->setGenre('pop-rock');
$band3->addMusician($mus1);
$band3->addMusician($mus2);
$band3->addMusician($mus3);



//var_dump($band->getMusician()); die;

echo $band3->getName();
echo '<br>';

echo $band3->getGenre();
echo '<br>';
echo $band3->getMusician();
echo '<br>';
echo $band3->getInstruments();

include('template/index.php');
