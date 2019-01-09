<?php

namespace App\DataFixtures;

use App\Entity\Hours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HoursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $table1_monday = new Hours();
        $table1_monday
            ->setDay('Lundi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_monday);
        $this->addReference('table1-monday', $table1_monday);

        $table1_tuesday = new Hours();
        $table1_tuesday
            ->setDay('Mardi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_tuesday);
        $this->addReference('table1-tuesday', $table1_tuesday);

        $table1_wednesday = new Hours();
        $table1_wednesday
            ->setDay('Mercredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_wednesday);
        $this->addReference('table1-wednesday', $table1_wednesday);

        $table1_thursday = new Hours();
        $table1_thursday
            ->setDay('Jeudi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_thursday);
        $this->addReference('table1-thursday', $table1_thursday);

        $table1_friday = new Hours();
        $table1_friday
            ->setDay('Vendredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_friday);
        $this->addReference('table1-friday', $table1_friday);

        $table1_saturday = new Hours();
        $table1_saturday
            ->setDay('Samedi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_saturday);
        $this->addReference('table1-saturday', $table1_saturday);

        $table1_sunday = new Hours();
        $table1_sunday
            ->setDay('Dimanche')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table1'))
        ;
        $manager->persist($table1_sunday);
        $this->addReference('table1-sunday', $table1_sunday);



        $manager->flush();
   }


}
