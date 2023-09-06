<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Facture;
use App\Entity\Commande;
use App\Form\ContactType;
use Symfony\Component\Uid\Uuid;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use App\Repository\FactureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function indexCommand(
        SessionInterface $session,
        Request $request,
        ProduitRepository $produitRepository,
        CommandeRepository $commandeRepository,
        FactureRepository $factureRepository): Response
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
            
            //Insertion de la date du jour ou la commande est prise
            $commande->setCreatedAt(new DateTimeImmutable());

            //Insertion de la reférence dans la BDD
            $commande->setReference($reference);

            $check = $request->get('paypal');

            if($check)
            {
                $commande->setPayement('paypal');
            }else{

                $form->get('paypal')->setDisabled(true);
            }

            $commande->setTotal($total + $livraison);

            //Enregistrement des produit dans la BDD avec leur quantité aussi
            foreach ($panier as $id => $quantite) {
                
                $commande->addProduit($produit);
                
                $nouvelleQuantite = $produit->getQuantiter() - $quantite;
                $produit->setQuantiter($nouvelleQuantite);
                $produitRepository->save($produit, true);
                $commande->setQuantiter($quantite);
            }

            //création de la facture
            $facture = new Facture();
            $facture->setDateFacture(new DateTimeImmutable());

            $commande->setCommandeFacture($facture);

            // Enregistrer les entités dans la base de données
            $factureRepository->save($facture, true);
            $commandeRepository->save($commande,true);

            //Vider le panier
            $session->remove('panier');

            // Rediriger l'utilisateur sur la page facture
            return $this->redirectToRoute('app_facture');
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
