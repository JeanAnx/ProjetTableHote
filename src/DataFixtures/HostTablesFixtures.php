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
            ->setName("La Marée des Crustacés")
            ->setMinPrice(25)
            ->setMaxPrice(50)
            ->setCapacity(60)
            ->setAddress("2, place de la Crevette")
            ->setCity("La Baule")
            ->setNote(4.5)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Magnifique table d'hôte de bord de mer.")
            ->setZipCode("44130")
            ->setWebsite("www.maree-crustacés.com")
            ->setImg(array("table1.jpg"))
            ->setTel("0238202020");

        $manager->persist($table1);
        $this->addReference('table1', $table1);

        $table2 = new HostTables();
        $table2
            ->setName("La Toupie du Salami")
            ->setMinPrice(15)
            ->setMaxPrice(35)
            ->setCapacity(20)
            ->setAddress("2, place de la Mairie")
            ->setCity("Nantes")
            ->setNote(3)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Le salami c'est la vie, surtout en toupie.")
            ->setZipCode("44000")
            ->setWebsite("www.toupie-salami.com")
            ->setImg(array("table2.jpg"))
            ->setTel("0238202020");

        $manager->persist($table2);
        $this->addReference('table2', $table2);

        $table3 = new HostTables();
        $table3
            ->setName("La Tortilla de Maria")
            ->setMinPrice(15)
            ->setMaxPrice(30)
            ->setCapacity(80)
            ->setAddress("3, rue Jeanne d'Arc")
            ->setCity("Orléans")
            ->setNote(3.5)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Venez découvrir les tortillas tortillantes de la mama Maria.")
            ->setZipCode("45000")
            ->setWebsite("www.tortilla-maria.com")
            ->setImg(array("table3.jpg"))
            ->setTel("0238202020");

        $manager->persist($table3);
        $this->addReference('table3', $table3);


        $table4 = new HostTables();
        $table4
            ->setName("L'Envers du Bacon")
            ->setMinPrice(20)
            ->setMaxPrice(45)
            ->setCapacity(60)
            ->setAddress("7, place du Parlement")
            ->setCity("Angers")
            ->setNote(4.3)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Repartez avec 3kg de plus et une peau grasse comme jamais.")
            ->setZipCode("49000")
            ->setWebsite("www.envers-bacon.com")
            ->setImg(array("table4.jpg"))
            ->setTel("0238202020");

        $manager->persist($table4);
        $this->addReference('table4', $table4);


        $table5 = new HostTables();
        $table5
            ->setName("Graines pour tous")
            ->setMinPrice(20)
            ->setMaxPrice(45)
            ->setCapacity(60)
            ->setAddress("16, place Boulgour")
            ->setCity("Rennes")
            ->setNote(4.3)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Pour tous les mangeurs de graines en tout genre.")
            ->setZipCode("35000")
            ->setWebsite("www.grainespourtous.com")
            ->setImg(array("table5.jpg"))
            ->setTel("0238202020");

        $manager->persist($table5);
        $this->addReference('table5', $table5);


        $manager->flush();
    }
}
