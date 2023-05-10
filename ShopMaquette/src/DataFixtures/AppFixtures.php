<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Fournisseur;
use App\Entity\SousCategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $f1 = new Fournisseur();
        $f1->setNom("Bandai")
            ->setAdresse("Tour W – 102 Terrasse Boieldieu ")
            ->setCp("92085")
            ->setPays("France")
            ->setVille("Paris");
            
        $manager->persist($f1);


        $c1 = new Categorie();
        $c1->setNom("Hg")
            ->setImage("Logo02.png");
            
        $manager->persist($c1);
        $this->addReference("categorie_". 1, $c1);


        $s1 = new SousCategorie();
        $s1->setNom("Gundam")
            ->setCategorie($this->getReference("categorie_". 1))
            ->setImage("LimageMagique.png");
            
        $manager->persist($s1);

        $manager->flush();
    }
}
