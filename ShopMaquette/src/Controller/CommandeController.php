<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Produit;
use App\Form\ProfilType;
use App\Form\ContactType;
use App\Repository\UserRepository;
use App\Repository\ClientRepository;
use App\Repository\ContactRepository;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session,
                            Request $request,
                            ClientRepository $clientRepository,
                            ProduitRepository $produitRepository,
                            CommandeRepository $commandeRepository): Response
    {
        //Création du panier
        $panier = $session->get("panier", []);

        //Fabrication des données 
        $dataPanier = [];
        $total = 0;
        $tva = 0;
        $livraison = 5;
        
        //Savoir la quantité de produit dans le panier 
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

        //Condition si l'utilisateur n'est plus connecter
        if (!$user) {
        return $this->redirectToRoute('app_login');
        }


        // le client et le contact associés à l'utilisateur
        $client = $user->getClient();

        //Boucle pour sortir la liste des valeur du tableau contact via user
        $contact = $client->getContacts()->first();

        //Creation du formulaire
        $form = $this->createForm(ContactType::class, [

        //Contact Entity recuperation données
        'adresseF' => $contact->getAdresse(),
        'adresseL' => $contact->getAdresse()
        ]);

        //Requete pour crée le formulaire
        $form->handleRequest($request);

        //Condition pour modifier les table du client
        if ($form->isSubmitted() && $form->isValid()) {

        // Récupérer les données du formulaire
        $formData = $form->getData();


        $contact->setAdresselivraison($formData['adresseF']);
        $contact->setAdresseFacturation($formData['adresseL']);

        // Enregistrer les entités dans la base de données
        $commandeRepository->save($contact,true);

        // Rediriger l'utilisateur sur la même page
        return $this->redirectToRoute('app_user');
        }

        return $this->render('commande/index.html.twig', [
            'Commande' => $form->createView(),
            'dataPanier' => $dataPanier,
            'total' => $total,
            'tva' => $tva,
            'livraison' => $livraison,
        ]);

    }
}
