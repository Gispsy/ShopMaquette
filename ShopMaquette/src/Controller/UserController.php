<?php

namespace App\Controller;

use App\Form\ProfilType;
use App\Repository\UserRepository;
use App\Repository\ClientRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function indexUser(ClientRepository $clientRepository,
                            UserRepository $userRepository,
                            ContactRepository $contactRepository,
                            Request $request): Response
    {

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
        $form = $this->createForm(ProfilType::class, [

        //Client entity recuperation données
        'nom' => $client->getNom(),
        'prenom' => $client->getPrenom(),

        //Contact Entity recuperation données
        'pays' => $contact->getPays(),
        'adresse' => $contact->getAdresse(),
        'ville' => $contact->getVille(),
        'codepostal' => $contact->getCodepostal(),
        'numero' => $contact->getNumeroTelephone(),

        //User Entity recuperation données
        'email' => $user->getEmail()

        ]);

        //Requete pour crée le formulaire
        $form->handleRequest($request);

        //Condition pour modifier les table du client
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérer les données du formulaire
            $formData = $form->getData();

            // Mettre à jour les entités avec les nouvelles données Client
            $client->setNom($formData['nom']);
            $client->setPrenom($formData['prenom']);

            // Mettre à jour les entités avec les nouvelles données Contact
            $contact->setPays($formData['pays']);
            $contact->setAdresse($formData['adresse']);
            $contact->setVille($formData['ville']);
            $contact->setCodepostal($formData['codepostal']);
            $contact->setNumeroTelephone($formData['numero']);

            // Mettre à jour les entités avec les nouvelles données User
            $user->setEmail($formData['email']);

            // Enregistrer les entités dans la base de données
            $clientRepository->save($client,true);
            $contactRepository->save($contact,true);
            $userRepository->save($user,false);

            // Rediriger l'utilisateur sur la même page
            return $this->redirectToRoute('app_user');
        }

        //si bien connecter alors redirection sur la pages de profil
        return $this->render('user/indexUser.html.twig', [
            'Profil' => $form->createView(),
        ]);
    }
}
