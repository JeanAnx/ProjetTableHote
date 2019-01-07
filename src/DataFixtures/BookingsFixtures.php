<?php

namespace App\DataFixtures;

use App\Entity\Bookings;
use App\Entity\HostTables;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BookingsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Bookings();
        $book1
            ->setDate(new \DateTime('2019-02-14 12:00:00'))
            ->setTableId($this->getReference('table1'))
            ->setSeats('70')
            ->setName('Dupont')
            ->setHealth(['Vegan'])
        ;
        $manager->persist($book1);
        $this->addReference('book1', $book1);

        $book2 = new Bookings();
        $book2
            ->setDate(new \DateTime('2019-02-08 13:00:00'))
            ->setTableId($this->getReference('table2'))
            ->setSeats('70')
            ->setName('Dupond')
            ->setHealth(['Sans Gluten'])
        ;
        $manager->persist($book2);
        $this->addReference('book2', $book2);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return array(HostTablesFixtures::class);
    }
}
