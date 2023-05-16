<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Fournisseur;
use App\Entity\SousCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

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
            $this->addReference("fournisseur_". 1, $f1);
            
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

        $p1 = new Produit();
        $p1->setNom("Gundam Astray")
            ->setFournisseur($this->getReference("fournisseur_". 1))
            ->setQuantiter(5)
            ->setPrixPHUT(5.3)
            ->setDescription("Model kit du gundam astray")
            ->setPublicité(true);
            $this->addReference("produit_". 1, $p1);
            
        $manager->persist($p1);

        $i1 = new Image();
        $i1 ->setProduit($this->getReference("produit_". 1))
            ->setNom("gundamastray-64632e6b0ed15382232060.jpg");
            
        $manager->persist($i1);


        $manager->flush();
    }
}
