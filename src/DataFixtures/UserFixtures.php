<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encrypt;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encrypt = $encoder;
    }
    public function load(ObjectManager $manager)
    {

        $mathilde = new User();
        $mathilde
            ->setEmail("Mathilde@dawan.fr")
            ->setPassword($this->encrypt->encodePassword($mathilde,"dawan"))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($mathilde);

        $jean = new User();
        $jean
            ->setEmail("Jean@dawan.fr")
            ->setPassword($this->encrypt->encodePassword($jean,"dawan"))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($jean);

        $kilian = new User();
        $kilian
            ->setEmail("Kilian@dawan.fr")
            ->setPassword($this->encrypt->encodePassword($kilian,"dawan"))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($kilian);
        $this->addReference('kilian', $kilian);

        $manager->flush();
    }
}
