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

//TABLE 2
        $table2_monday = new Hours();
        $table2_monday
            ->setDay('Lundi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_monday);
        $this->addReference('table2-monday', $table2_monday);

        $table2_tuesday = new Hours();
        $table2_tuesday
            ->setDay('Mardi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_tuesday);
        $this->addReference('table2-tuesday', $table2_tuesday);

        $table2_wednesday = new Hours();
        $table2_wednesday
            ->setDay('Mercredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_wednesday);
        $this->addReference('table2-wednesday', $table2_wednesday);

        $table2_thursday = new Hours();
        $table2_thursday
            ->setDay('Jeudi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_thursday);
        $this->addReference('table2-thursday', $table2_thursday);

        $table2_friday = new Hours();
        $table2_friday
            ->setDay('Vendredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_friday);
        $this->addReference('table2-friday', $table2_friday);

        $table2_saturday = new Hours();
        $table2_saturday
            ->setDay('Samedi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_saturday);
        $this->addReference('table2-saturday', $table2_saturday);

        $table2_sunday = new Hours();
        $table2_sunday
            ->setDay('Dimanche')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table2'))
        ;
        $manager->persist($table2_sunday);
        $this->addReference('table2-sunday', $table2_sunday);


//TABLE 3
        $table3_monday = new Hours();
        $table3_monday
            ->setDay('Lundi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_monday);
        $this->addReference('table3-monday', $table3_monday);

        $table3_tuesday = new Hours();
        $table3_tuesday
            ->setDay('Mardi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_tuesday);
        $this->addReference('table3-tuesday', $table3_tuesday);

        $table3_wednesday = new Hours();
        $table3_wednesday
            ->setDay('Mercredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_wednesday);
        $this->addReference('table3-wednesday', $table3_wednesday);

        $table3_thursday = new Hours();
        $table3_thursday
            ->setDay('Jeudi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_thursday);
        $this->addReference('table3-thursday', $table3_thursday);

        $table3_friday = new Hours();
        $table3_friday
            ->setDay('Vendredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_friday);
        $this->addReference('table3-friday', $table3_friday);

        $table3_saturday = new Hours();
        $table3_saturday
            ->setDay('Samedi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_saturday);
        $this->addReference('table3-saturday', $table3_saturday);

        $table3_sunday = new Hours();
        $table3_sunday
            ->setDay('Dimanche')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table3'))
        ;
        $manager->persist($table3_sunday);
        $this->addReference('table3-sunday', $table3_sunday);



//TABLE 4
        $table4_monday = new Hours();
        $table4_monday
            ->setDay('Lundi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_monday);
        $this->addReference('table4-monday', $table4_monday);

        $table4_tuesday = new Hours();
        $table4_tuesday
            ->setDay('Mardi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_tuesday);
        $this->addReference('table4-tuesday', $table4_tuesday);

        $table4_wednesday = new Hours();
        $table4_wednesday
            ->setDay('Mercredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_wednesday);
        $this->addReference('table4-wednesday', $table4_wednesday);

        $table4_thursday = new Hours();
        $table4_thursday
            ->setDay('Jeudi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_thursday);
        $this->addReference('table4-thursday', $table4_thursday);

        $table4_friday = new Hours();
        $table4_friday
            ->setDay('Vendredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_friday);
        $this->addReference('table4-friday', $table4_friday);

        $table4_saturday = new Hours();
        $table4_saturday
            ->setDay('Samedi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_saturday);
        $this->addReference('table4-saturday', $table4_saturday);

        $table4_sunday = new Hours();
        $table4_sunday
            ->setDay('Dimanche')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table4'))
        ;
        $manager->persist($table4_sunday);
        $this->addReference('table4-sunday', $table4_sunday);



        //TABLE 5
        $table5_monday = new Hours();
        $table5_monday
            ->setDay('Lundi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_monday);
        $this->addReference('table5-monday', $table5_monday);

        $table5_tuesday = new Hours();
        $table5_tuesday
            ->setDay('Mardi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_tuesday);
        $this->addReference('table5-tuesday', $table5_tuesday);

        $table5_wednesday = new Hours();
        $table5_wednesday
            ->setDay('Mercredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_wednesday);
        $this->addReference('table5-wednesday', $table5_wednesday);

        $table5_thursday = new Hours();
        $table5_thursday
            ->setDay('Jeudi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_thursday);
        $this->addReference('table5-thursday', $table5_thursday);

        $table5_friday = new Hours();
        $table5_friday
            ->setDay('Vendredi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('14:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_friday);
        $this->addReference('table5-friday', $table5_friday);

        $table5_saturday = new Hours();
        $table5_saturday
            ->setDay('Samedi')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('23:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_saturday);
        $this->addReference('table5-saturday', $table5_saturday);

        $table5_sunday = new Hours();
        $table5_sunday
            ->setDay('Dimanche')
            ->setMorningStart(new \DateTime('12:00:00'))
            ->setMorningEnd(new \DateTime('15:00:00'))
            ->setEveningStart(new \DateTime('19:00:00'))
            ->setEveningEnd(new \DateTime('22:00:00'))
            ->setHostTable($this->getReference('table5'))
        ;
        $manager->persist($table5_sunday);
        $this->addReference('table5-sunday', $table5_sunday);
        $manager->flush();
   }




}
