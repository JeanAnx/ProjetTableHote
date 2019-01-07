<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Users extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user1 = new Users();
        $user1
          ->setFirstName('Jackie')
          ->setLastName('Durand')
          ->setEmail('j.durand@yahoo.fr')
          ->setPasswordHash('motdepasse')
          ->setHealth('gluten')
          ;

          $user2 = new Users();
          $user2
            ->setFirstName('Marie')
            ->setLastName('Podevin')
            ->setEmail('m.podevin@gmail.fr')
            ->setPasswordHash('motdepasse')
            ->setHealth('poisson')
            ;

          $user3 = new Users();
          $user3
            ->setFirstName('Jean-Louis')
            ->setLastName('Martin')
            ->setEmail('jl.martin@yahoo.fr')
            ->setPasswordHash('motdepasse')
            ->setHealth('');
            ;

          $manager->persist($user1);
          $manager->persist($user2);

          $manager->flush();
    }
}
