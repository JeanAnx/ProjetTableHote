<?php

namespace App\DataFixtures;

use App\Entity\HostTables;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HostTablesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $table1 = new HostTables();
        $table1
            ->setName("La marée des envies")
            ->setMinPrice(20)
            ->setMaxPrice(35)
            ->setCapacity(60)
            ->setAddress("2, place de la mairie")
            ->setCity("La Baule")
            ->setNote(4.5)
            ->setLongDescription("Magnifique table d'hôte de bord de mer")
            ->setShortDescription("Venez découvrir")
            ->setZipCode("44130")
            ->setWebsite("www.superResto.com")
            ->setTel("0629304942");

        $manager->persist($table1);

        $table2 = new HostTables();
        $table2
            ->setName("La toupie des prix")
            ->setMinPrice(10)
            ->setMaxPrice(25)
            ->setCapacity(20)
            ->setAddress("2, place de la mairie")
            ->setCity("La Baule")
            ->setNote(2.0)
            ->setLongDescription("Magnifique table d'hôte de bord de mer")
            ->setShortDescription("Venez découvrir")
            ->setZipCode("44130")
            ->setWebsite("www.superResto.com")
            ->setTel("0629304942");

        $manager->persist($table2);

        $table3 = new HostTables();
        $table3
            ->setName("La tortilla de Maria")
            ->setMinPrice(7)
            ->setMaxPrice(18.50)
            ->setCapacity(80)
            ->setAddress("2, place de la mairie")
            ->setCity("La Baule")
            ->setNote(4)
            ->setLongDescription("Magnifique table d'hôte de bord de mer")
            ->setShortDescription("Venez découvrir")
            ->setZipCode("44130")
            ->setWebsite("www.superResto.com")
            ->setTel("0629304942");

        $manager->persist($table3);

        $manager->flush();
    }
}
