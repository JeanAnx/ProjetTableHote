<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user1 = new Users();
        $user1
          ->setFirstName('Jackie')
          ->setLastName('Durand')
          ->setEmail('j.durand@yahoo.fr')
          ->setPasswordHash('motdepasse')
          ->setTel('0601010102')
          ->setHealth('gluten')
          ;

          $user2 = new Users();
          $user2
            ->setFirstName('Marie')
            ->setLastName('Podevin')
            ->setEmail('m.podevin@gmail.fr')
            ->setPasswordHash('motdepasse')
            ->setTel('0601010102')
            ->setHealth('poisson')
            ;

          $user3 = new Users();
          $user3
            ->setFirstName('Jean-Louis')
            ->setLastName('Martin')
            ->setEmail('jl.martin@yahoo.fr')
            ->setPasswordHash('motdepasse')
            ->setTel('0601010102')
            ->setHealth('');
            ;

          $manager->persist($user1);
          $manager->persist($user2);
          $manager->persist($user3);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [UsersFixtures::class];
    }
}
