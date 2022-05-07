<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Pfe extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($i=0;$i<100;$i++){
            $Pfe =new \App\Entity\Pfe();
            $Pfe->setTitle($faker->title);
            $Pfe->setStudent($faker->name);

            $manager->persist($Pfe);
        }
        $manager->flush();
    }
}
