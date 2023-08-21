<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FactureController extends AbstractController
{
    #[Route('/facture', name: 'app_facture')]
    public function facture(
        SessionInterface $session,
        Request $request,
        ClientRepository $clientRepository,
        ProduitRepository $produitRepository,
        CommandeRepository $commandeRepository): Response
    {

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


        // Obtenir l'utilisateur connecté
        $user = $this->getUser();

        //Vider le panier
        $session->remove('panier');
        //Vas sur la vue de facture.html.twig
        return $this->render('facture/index.html.twig', [
            'dataPanier' => $dataPanier,
            'total' => $total,
            'tva' => $tva,
            'livraison' => $livraison,
        ]);
    }
}
