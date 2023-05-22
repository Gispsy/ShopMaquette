<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Repository\CategorieRepository;
use App\Repository\ImageRepository;
use App\Repository\ProduitRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProduitRepository $produit,
                                ImageRepository $img,
                                CategorieRepository $categorie): Response
    {
        return $this->render('home/index.html.twig', [
                'produits' => $produit->findAll(),
                'images' => $img->findAll(),
                'categories' => $categorie->findAll()
        ]);
    }

    #[Route('/Categorie', name: 'app_ModelKit')]
    public function indexModel(CategorieRepository $categorie,
                                    SousCategorieRepository $souscategorie): Response
    {

        return $this->render('home/ModelKit.html.twig', [
                'categories' => $categorie->findAll(),
                'souscategories' => $souscategorie->findAll()
        ]);
    }

    #[Route('/modelkit/{categorie}', name: 'app_SousCategorie')]
    public function SousCategorie(Categorie $categorie): Response
    {

        return $this->render('home/SousCategorie.html.twig', [
                'categorie' => $categorie
        ]);
    }

    #[Route('/catalogue/{souscategorie}', name: 'app_catalogue')]
    public function Produit(SousCategorie $souscategorie,
                                ProduitRepository $produit): Response
    {

        return $this->render('home/produit.html.twig', [
                'souscategorie' => $souscategorie,
        ]);
    }
}
