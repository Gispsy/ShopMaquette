<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use App\Entity\Contact;
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
    public function index(ClientRepository $clientRepository,
                            UserRepository $userRepository,
                            ContactRepository $contactRepository,
                            Request $request): Response
    {
        //Entity utiliser 
        // $user = new User();
        // $client = new Client();
        // $contact = new Contact();

        // Obtenir l'utilisateur connecté
        $user = $this->getUser();
    
        // le client et le contact associés à l'utilisateur
        $client = $user->getClient();
        $contact = $client->getContacts();

        //Creation du formulaire
        $form = $this->createForm(ProfilType::class, [

        //Client entity
        'nom' => $client->getNom(),
        'prenom' => $client->getPrenom(),

        //Contact Entity
        'ville' => $contact->getVille(),
        'codepostal' => $contact->getCodepostal(),
        'numero' => $contact->getNumeroTelephone(),

        //User Entity
        'adressemail' => $user->getEmail()

        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire
            $formData = $form->getData();

            // Mettre à jour les entités avec les nouvelles données Client
            $client->setNom($formData['nom']);
            $client->setPrenom($formData['prenom']);

            // Mettre à jour les entités avec les nouvelles données Contact
            $contact->setVille($formData['ville']);
            $contact->setCodepostal($formData['codepostal']);
            $contact->setNumeroTelephone($formData['numero']);

            // Mettre à jour les entités avec les nouvelles données User
            $user->setEmail($formData['adressemail']);

            // Enregistrer les entités dans la base de données
            $clientRepository->save($client);
            $contactRepository->save($contact);
            $userRepository->save($user);

            // Rediriger l'utilisateur
            return $this->redirectToRoute('app_home');
        }

        return $this->render('user/index.html.twig', [
            'Profil' => $form->createView(),
        ]);
    }
}
