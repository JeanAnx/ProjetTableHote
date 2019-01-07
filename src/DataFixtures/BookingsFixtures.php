<?php

namespace App\DataFixtures;

use App\Entity\Bookings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BookingsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Bookings();
        $book1
            ->setDate(new \DateTime('2019-02-14 12:00:00'))
            ->setSeats('70')
            ->setName('Dupont')
            ->setHealth(['Vegan'])
        ;
        $manager->persist($book1);
        $this->addReference('book1', $book1);

        $book2 = new Bookings();
        $book2
            ->setDate(new \DateTime('2019-02-08 13:00:00'))
            ->setSeats('70')
            ->setName('Dupond')
            ->setHealth(['Sans Gluten'])
        ;
        $manager->persist($book2);
        $this->addReference('book2', $book2);

        $manager->flush();
    }
}
