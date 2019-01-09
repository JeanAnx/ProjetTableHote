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
            ->setMinPrice(20)
            ->setMaxPrice(35)
            ->setCapacity(60)
            ->setAddress("2, place de la Mairie")
            ->setCity("La Baule")
            ->setNote(4.5)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Magnifique table d'hôte de bord de mer")
            ->setZipCode("44130")
            ->setWebsite("www.maree-crustacés.com")
            ->setImg(array("tableDhote1.jpg"))
            ->setTel("0238202020");

        $manager->persist($table1);
        $this->addReference('table1', $table1);

        $table2 = new HostTables();
        $table2
            ->setName("La Toupie du Salami")
            ->setMinPrice(10)
            ->setMaxPrice(25)
            ->setCapacity(20)
            ->setAddress("2, place de la Mairie")
            ->setCity("Nantes")
            ->setNote(2.0)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Venez découvrir blabla")
            ->setZipCode("44000")
            ->setWebsite("www.toupie-salami.com")
            ->setImg(array("tableDhote2.jpg"))
            ->setTel("0238202020");

        $manager->persist($table2);
        $this->addReference('table2', $table2);

        $table3 = new HostTables();
        $table3
            ->setName("La Tortilla de Maria")
            ->setMinPrice(7)
            ->setMaxPrice(18.50)
            ->setCapacity(80)
            ->setAddress("2, place de la Mairie")
            ->setCity("La Baule")
            ->setNote(4)
            ->setLongDescription("Spicy jalapeno bacon ipsum dolor amet andouille pastrami adipisicing, corned beef turkey boudin ground round proident duis rump elit. Andouille cupidatat sunt, ipsum tenderloin aliquip occaecat venison turkey esse aliqua reprehenderit est ham corned beef. Hamburger drumstick eu, nostrud elit mollit shankle pork belly ham pariatur excepteur. Exercitation t-bone ea officia, corned beef ullamco nisi irure pariatur labore esse. Pariatur occaecat deserunt pork loin. Beef ribs deserunt sed bresaola pig short loin doner exercitation ad. Ea meatball minim veniam ribeye, ham hock brisket buffalo jowl quis pork belly capicola.")
            ->setShortDescription("Venez découvrir blabla")
            ->setZipCode("44130")
            ->setWebsite("www.tortilla-maria.com")
            ->setImg(array("tableDhote3.jpg"))
            ->setTel("0238202020");

        $manager->persist($table3);
        $this->addReference('table3', $table3);

        $manager->flush();
    }
}
