<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\ContactType;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use DateTime;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Uid\Uuid;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session,
                            Request $request,
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

        //Sors la premiere adresse du client
        $contact = $client->getContacts()->first();

        //Nouvelle entity commande
        $commande = new Commande();

        //Creation du formulaire
        $form = $this->createForm(ContactType::class, [

        //Contact Entity recuperation données
        'adresseF' => $contact->getAdresse(),
        'adresseL' => $contact->getAdresse()
        ]);

        //Requete pour crée le formulaire
        $form->handleRequest($request);

        //Condition pour valider la commande du client
        if ($form->isSubmitted() && $form->isValid()) {


            // Récupérer les données du formulaire
            $formData = $form->getData();

            //Créer une réference de la commande unique
            //toRfc4122() Permet de convertir l'objet Uuid en chaine de caractere
            $reference = Uuid::v4()->toRfc4122();

            //Recupére les adresses du client qu'il a rentrer pour la commande
            $commande->setAdresselivraison($formData['adresseF']);
            $commande->setAdresseFacturation($formData['adresseL']);

            //recupere id du client
            $commande->setClient($client);
            
            //Set de la date du jour ou la commande est prise
            $commande->setCreatedAt(new DateTimeImmutable());

            //Insert la reférence dans la BDD
            $commande->setReference($reference);

            $check = $request->get('paypal');

            if($check)
            {
                $commande->setPayement('paypal');
            }else{

                $form->get('paypal')->setDisabled(true);
            }

            //Enregistrement des produit dans la BDD avec leur quantité aussi
            foreach ($panier as $id => $quantite) {
                
                $commande->addProduit($produit);
                
                $nouvelleQuantite = $produit->getQuantiter() - $quantite;
                $produit->setQuantiter($nouvelleQuantite);
                $produitRepository->save($produit, true);
            }


            // Enregistrer les entités dans la base de données
            $commandeRepository->save($commande,true);

            // Rediriger l'utilisateur sur la page BonCommande
            return $this->redirectToRoute('app_bon_commande');
        }

        return $this->render('commande/index.html.twig', [
            'Commande' => $form->createView(),
            'dataPanier' => $dataPanier,
            'total' => $total,
            'tva' => $tva,
            'livraison' => $livraison,
        ]);

    }

    #[Route('/boncommande', name: 'app_bon_commande')]
    public function BonCommande(SessionInterface $session,
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
        //Vas sur la vue de boncommande.html.twig
        return $this->render('commande/boncommande.html.twig', [
            'dataPanier' => $dataPanier,
            'total' => $total,
            'tva' => $tva,
            'livraison' => $livraison,
        ]);
    }
}
