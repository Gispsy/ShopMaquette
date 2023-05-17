<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\CategorieRepository;
use App\Repository\ImageRepository;
use App\Repository\ProduitRepository;
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

    #[Route('/modelkit', name: 'app_ModelKit')]
    public function indexModel(CategorieRepository $categorie): Response
    {

        return $this->render('home/ModelKit.html.twig', [
                'categories' => $categorie->findAll()
        ]);
    }
}
