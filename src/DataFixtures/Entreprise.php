<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Entreprise extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($i=0;$i<100;$i++){
            $Entreprise =new \App\Entity\Entreprise();
            $Entreprise->setDesignation($faker->company );

            $manager->persist($Entreprise);

        }
        $manager->flush();
    }
}
