<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    //Index panier
    #[Route('/panier', name: 'app_panier')]
    public function Panier(SessionInterface $session, ProduitRepository $produitRepository)
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

        return $this->render('panier/panier.html.twig', compact("dataPanier", "total", "tva", "livraison"));
    }

    //Ajout de produit dans le panier 
    #[Route('/add/{id}', name: 'app_add_panier')]
    public function AddPanier(Produit $produit, SessionInterface $session)
    {

        //Récuperation du panier
        $panier = $session->get("panier", []);
        $id = $produit->getId();

        if(!empty($panier[$id])){
            $panier[$id]++;

        }else{

            $panier[$id] = 1;
        }

        //Sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute('app_panier');
    }

    //Enlever 1 en quantité de produit
    #[Route('/remove/{id}', name: 'app_remove_panier')]
    public function RemovePanier(Produit $produit, SessionInterface $session)
    {

        //Récuperation du panier
        $panier = $session->get("panier", []);
        $id = $produit->getId();

        if(!empty($panier[$id])){
            if ($panier[$id] > 1) {
                
                $panier[$id]--;
            }else {
                unset($panier[$id]);
            }
        }else{

            $panier[$id] = 1;
        }

        //Sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute('app_panier');
    }

    //Suppression du produit dans le panier
    #[Route('/delete/{id}', name: 'app_delete_panier')]
    public function DeletePanier(Produit $produit, SessionInterface $session)
    {

        //Récuperation du panier
        $panier = $session->get("panier", []);
        //Récuperation id produit
        $id = $produit->getId();

        if(!empty($panier[$id]))
        {

                unset($panier[$id]);
        }

        //Sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute('app_panier');
    }
    
}
