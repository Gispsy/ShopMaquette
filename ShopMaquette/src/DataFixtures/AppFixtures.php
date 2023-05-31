<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Image;
use App\Entity\Client;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Contact;
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
        $c1->setNom("Gundam")
            ->setImage("Logo02.png");
            
        $manager->persist($c1);
        $this->addReference("categorie_". 1, $c1);

        $c2 = new Categorie();
        $c2->setNom("Evangelion")
            ->setImage("Envangelionlogo.png");
            
        $manager->persist($c2);
        $this->addReference("categorie_". 2, $c2);


        $s1 = new SousCategorie();
        $s1->setNom("RG")
            ->setCategorie($this->getReference("categorie_". 1))
            ->setImage("RGlogo.png");
            
        $manager->persist($s1);

        $s2 = new SousCategorie();
        $s2->setNom("HG")
            ->setCategorie($this->getReference("categorie_". 2))
            ->setImage("HGlogo.png");
            
        $manager->persist($s2);

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


        $u1 = new User();
        $u1 ->setEmail("duc@gmail.com")
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword("1234")       //$2y$13$yrnTjWpGhPyp524h2YOlfeE8dkN5CJ62BWNSVSkFt99KkbOEmvYSC
            ->setisVerified(true);
        
        $manager->persist($u1);

        $cont = new Contact();
        $cont ->setAdressemail("duc@gmail.com")
                ->setAdresse("54 rue des jacobins")
                ->setVille("Amiens")
                ->setPays("France")
                ->setCodepostal("80000")
                ->setNumero("0673245163");

        $manager->persist($cont);

        $cl1 = new Client();
        $cl1 ->setNom("Ducamp")
                ->setType("0");
        
        $manager->persist($cl1);


        $manager->flush();
    }
}
