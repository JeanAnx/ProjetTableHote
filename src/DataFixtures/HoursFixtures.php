<?php

namespace App\DataFixtures;

use App\Entity\Hours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HoursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $monday = new Hours();
        $monday
            ->setDay('monday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
        ;
        $manager->persist($monday);
        $this->addReference('hours-monday', $monday);

        $tuesday = new Hours();
        $tuesday
            ->setDay('tuesday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
        ;
        $manager->persist($tuesday);
        $this->addReference('hours-tuesday', $tuesday);

        $wednesday = new Hours();
        $wednesday
            ->setDay('wednesday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
        ;
        $manager->persist($wednesday);
        $this->addReference('hours-wednesday', $wednesday);

        $thursday = new Hours();
        $thursday
            ->setDay('thursday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
        ;
        $manager->persist($thursday);
        $this->addReference('hours-thursday', $thursday);

        $friday = new Hours();
        $friday
            ->setDay('friday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
        ;
        $manager->persist($friday);
        $this->addReference('hours-friday', $friday);

        $saturday = new Hours();
        $saturday
            ->setDay('saturday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
        ;
        $manager->persist($saturday);
        $this->addReference('hours-saturday', $saturday);

        $sunday = new Hours();
        $sunday
            ->setDay('sunday')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
        ;
        $manager->persist($sunday);
        $this->addReference('hours-sunday', $sunday);



        $manager->flush();
    }
}
