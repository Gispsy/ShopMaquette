<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Produit;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session,
                            ClientRepository $clientRepository,
                            ProduitRepository $produitRepository): Response
    {
        //Création du panier
        $panier = $session->get("panier", []);

        //Fabrication des données 
        $dataPanier = [];
        $total = 0;
        $tva = 0;
        $livraison = 5;
        
        foreach ($panier as $id => $quantite) {
            $produit = $produitRepository->find($id);
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite
            ];

            $total += $produit->getPrixPHUT() * $quantite;
            $tva = $total / 100 * 10;
        }

        return $this->render('commande/index.html.twig', compact("dataPanier", "total", "tva", "livraison"));
    

        // return $this->render('commande/index.html.twig', [
        //     'controller_name' => 'CommandeController',
        //     'client' => $clientRepository
        // ]);
    }
}
