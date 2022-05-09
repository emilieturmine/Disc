<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artiste;
use App\Entity\Disc;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artiste1 = new Artiste();

        $artiste1->setNom("Queens Of The Stone Age");
        $artiste1->setUrl("https://qotsa.com/");
        
        $manager->persist($artsite1);
        
        $disc1 = new Disc();
        $disc1->setTitle("Songs for the Deaf");
        $disc1->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
        $disc1->setLabel("Interscope Records");
        
        $manager->persist($disc1);
        
        // Pour associer vos entités
        $artiste1->addDisc($disc1);
       
        $manager->flush();
    }
