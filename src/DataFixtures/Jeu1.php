<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artiste;
use App\Entity\Disque;
class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artiste1 = new Artiste();

$artiste1->setNom("Queens Of The Stone Age");
$artiste1->setUrl("https://qotsa.com/");

$manager->persist($artiste1);

   
    $disque1 = new Disque();
$disque1->setTitre("Songs for the Deaf");
$disque1->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
$disque1->setAnnee(1988);
$disque1->setLabel("Interscope Records");

$manager->persist($disque1);

// Pour associer vos entités
$disque1->setArtiste($artiste1);
$manager->flush();

}
}
