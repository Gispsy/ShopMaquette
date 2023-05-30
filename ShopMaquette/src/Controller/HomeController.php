<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Repository\ImageRepository;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    public function Produit(SousCategorie $souscategorie): Response
    {

        return $this->render('home/produit.html.twig', [
                'souscategorie' => $souscategorie,
        ]);
    }

    #[Route('/detail/{id}', name: 'app_detail')]
    public function Detail(Produit $produit): Response
    {

        return $this->render('home/detail.html.twig', [
            
                'produits' => $produit
        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function Panier(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $panier = $session->get("panier", []);

        $dataPanier = [];
        $total = 0;

        foreach ($panier as $id => $quantite) {
            $produit = $produitRepository->find($id);
            $dataPanier[] = [
                "produits" => $produit,
                "quantite" => $quantite
            ];

            $total += $produit->getPrixPHUT() * $quantite;
        }

        return $this->render('home/panier.html.twig', compact("dataPanier", "total"));
    }

    #[Route('/add/{id}', name: 'app_add_panier')]
    public function AddPanier(Produit $produit, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $produit->getId();

        if(!empty($panier[$id])){
            $panier[$id]++;

        }else{

            $panier[$id] = 1;
        }

        $session->set("panier", $panier);

        return $this->redirectToRoute('app_panier');
    }
}
